<?php

declare(strict_types=1);

namespace App\Services\House;

use App\Data\Forms\FieldData;
use App\Data\House\HouseForFormData;
use App\Enums\Params\Types;
use App\Http\Requests\House\Data\FormCreateData;
use App\Http\Requests\House\Data\FormUpdateData;
use App\Http\Resources\Dict\DictFormsResource;
use App\Repositories\House\HouseRepository;
use App\Services\Forms\FieldsFormService;
use Illuminate\Support\Collection;
use Throwable;

final readonly class HouseFormService
{
    /**
     * @param HouseRepository $houseRepository
     * @param FieldsFormService $fieldsFormService
     */
    public function __construct(
        protected HouseRepository $houseRepository,
        protected FieldsFormService $fieldsFormService,
    )
    {

    }

    /**
     * @param FormCreateData $formCreateData
     * @return Collection<int, FieldData>
     * @throws Throwable
     */
    public function getFormStore(FormCreateData $formCreateData): Collection
    {
        return $this->getFormProperties(house: HouseForFormData::from([]));
    }

    /**
     * @param FormUpdateData $formUpdateData
     * @return Collection<int, FieldData>
     * @throws Throwable
     */
    public function getFormUpdate(FormUpdateData $formUpdateData): Collection
    {
        $house = HouseForFormData::fromModel($this->houseRepository->findById($formUpdateData->house_id));

        return $this->getFormProperties(house: $house, update:true);
    }

    /**
     * Добавляем свойства в общий список полей
     * @param HouseForFormData $house
     * @param ?bool $update
     * @return Collection<int, FieldData>
     * @throws Throwable
     */
    private function getFormProperties(HouseForFormData $house, bool $update=false): Collection
    {
        //Готовим данные для полей
        $materialWallId = $house->wall ? $house->wall->id : null;
        $connectedServicesIds = $house->services ? $house->services->pluck('id')->toArray() : null;

        //Формируем поля
        $fields = collect();
        $fields->add($this->fieldsFormService->getFieldSimple('floors', 'Количество этажей', $house->floors ?? null, true, Types::CONST_INT));
        $fields->add($this->fieldsFormService->getFieldSimple('roof', 'Цвет крыши', $house->roof ?? null, true, Types::CONST_STR));
        $fields->add($this->fieldsFormService->getFieldSimple('address', 'Адрес', $house->address ?? null, true, Types::CONST_STR));
        $fields->add($this->fieldsFormService->getFieldCheck('garage', 'Наличие гаража', $house->garage ?? false, false));
        $fields->add($this->fieldsFormService->getFieldDict('wall', 'Материал стен', true, 'material_wall', $materialWallId));

        //Поля только при обновлении
        if($update) {
            $fields->add($this->fieldsFormService->getFieldDict('services', 'Подключенные услуги', true, 'connected_service', $connectedServicesIds));
        }

        return $fields;
    }


}
