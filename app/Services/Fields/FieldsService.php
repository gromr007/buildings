<?php

declare(strict_types=1);

namespace App\Services\Fields;

use App\Data\Forms\ManageParamData;
use App\Enums\Params\Properties;
use Illuminate\Support\Collection;

final readonly class FieldsService
{
    /**
     *
     */
    public function __construct(

    )
    {

    }




    /**
     * Берем значения полей, одинаковых для роутов store и update
     * @param Collection<int, ManageParamData>
     * @param string $name
     * @return array<string, mixed>
     * */
    public static function getBasicFields(Collection $params, string $name): array
    {
        $props = [];
        foreach(Properties::{$name} as $propName) {
            $props[$propName] = static::getAttrFilter($params, $propName);
        }
        return $props;
    }


    /**
     * Берем значение свойства из списка параметров
     *
     * @param Collection<int, ManageParamData>
     * @param string $attr
     * @return mixed
     * */
    public static function getAttrFilter(Collection $params, string $attr): mixed
    {
        $filtered = $params->filter(function ($item) use ($attr) {
            return $item->key === $attr;
        });
        if($filtered->isNotEmpty()) {
            return $filtered->first()->value;
        }
        return null;
    }


}
