<?php

declare(strict_types=1);

namespace App\Services\Forms;

use App\Enums\Dict\DictEnum;
use App\Data\Forms\FieldData;
use App\Enums\Params\Types;
use App\Http\Resources\Dict\DictFormsResource;
use App\Repositories\House\HouseRepository;
use App\Services\Dict\DictService;
use Illuminate\Support\Collection;
use Throwable;

final readonly class FieldsFormService
{
    /**
     *
     *
     * @param HouseRepository $houseRepository
     * @param DictService $dictService
     */
    public function __construct(
        protected HouseRepository $houseRepository,
        protected DictService $dictService,
    )
    {

    }


    /**
     * Добавляем текстовые/числовые поля в форму
     * @param string $attr
     * @param string $name
     * @param mixed $value
     * @param bool $requir
     * @param string $type
     * @return FieldData
     * */
    public function getFieldSimple(string $attr, string $name, mixed $value, bool $requir, string $type): FieldData
    {
        return FieldData::from([
            'attr' => $attr,
            'name' => $name,
            'value' => $value,
            'is_required' => $requir,
            'type' => $type,
        ]);
    }


    /**
     * Добавляем справочные поля в форму
     * @param string $attr
     * @param string $name
     * @param bool $required
     * @param string $nameDict
     * @param mixed $idDict
     * @param ?Collection $customOptions
     * @return FieldData
     * */
    public function getFieldDict(string $attr, string $name, bool $required, string $nameDict, mixed $idDict, Collection|null $customOptions = null): FieldData
    {
        $modelName = DictEnum::modelName($nameDict);

        if(class_exists($modelName)) {
            $dictTable = $modelName::getTableName();
            $select = $this->dictService->all($nameDict);
            if(!is_null($idDict)) {
                if(is_array($idDict)) {
                    $valueDict = $select->filter(function ($item) use($idDict) {
                        return in_array($item->id, $idDict);
                    })->pluck('name')->toArray();
                } else {
                    $dict = $select->where('id', $idDict)->first();
                    if(!is_null($dict)) {
                        $valueDict = $dict->name;
                    }
                }
            }
        }

        if ($customOptions) {
            $select = $customOptions;
        }

        return FieldData::from([
            'attr' => $attr,
            'name' => $name,
            'value' => !empty($valueDict) ? $valueDict : null,
            'is_required' => $required,
            'type' => Types::CONST_DICT,
            'dict_id' => $idDict,
            'dict_table' => !empty($dictTable) ? $dictTable : null,
            'dict_options' => !empty($select) ? $select : null,
        ]);

    }

    /**
     * Добавляем Чек бокс поля в форму
     * @param string $attr
     * @param string $name
     * @param bool $value
     * @param bool $requir
     * @return FieldData
     * */
    public function getFieldCheck(string $attr, string $name, bool $value, bool $requir): FieldData
    {
        return FieldData::from([
            'attr' => $attr,
            'name' => $name,
            'value' => $value,
            'is_required' => $requir,
            'type' => Types::CONST_BOOL,
        ]);

    }

    /**
     * Добавляем Селект не словарный в форму
     * @param string $attr
     * @param string $name
     * @param bool $requir
     * @param mixed $value
     * @param Collection $options
     * @return FieldData
     * */
    public function getFieldSelect(string $attr, string $name, bool $requir, mixed $value, Collection $options): FieldData
    {
        return FieldData::from([
            'attr' => $attr,
            'name' => $name,
            'value' => $value,
            'is_required' => $requir,
            'type' => Types::CONST_DICT,
            'dict_options' => $options,
        ]);

    }


}
