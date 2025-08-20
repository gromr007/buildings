<?php

declare(strict_types=1);

namespace App\Services\Room;

use App\Data\Forms\FieldData;
use App\Data\Room\RoomForFormData;
use App\Enums\Params\Types;
use App\Http\Requests\Room\Data\FormCreateData;
use App\Http\Requests\Room\Data\FormUpdateData;
use App\Http\Resources\Dict\DictFormsResource;
use App\Repositories\Room\RoomRepository;
use App\Services\Forms\FieldsFormService;
use Illuminate\Support\Collection;
use Throwable;

final readonly class RoomFormService
{
    /**
     * @param RoomRepository $roomRepository
     * @param FieldsFormService $fieldsFormService
     */
    public function __construct(
        protected RoomRepository $roomRepository,
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
        return $this->getFormProperties(room: RoomForFormData::from([]));
    }

    /**
     * @param FormUpdateData $formUpdateData
     * @return Collection<int, FieldData>
     * @throws Throwable
     */
    public function getFormUpdate(FormUpdateData $formUpdateData): Collection
    {
        $room = RoomForFormData::fromModel($this->roomRepository->findById($formUpdateData->room_id));

        return $this->getFormProperties(room: $room, update:true);
    }

    /**
     * Добавляем свойства в общий список полей
     * @param RoomForFormData $room
     * @param ?bool $update
     * @return Collection<int, FieldData>
     * @throws Throwable
     */
    private function getFormProperties(RoomForFormData $room, bool $update=false): Collection
    {
        //Готовим данные для полей
        $materialFloorId = $room->floor ? $room->floor->id : null;
        $furnituresIds = $room->furnitures ? $room->furnitures->pluck('id')->toArray() : null;

        //Формируем поля
        $fields = collect();
        $fields->add($this->fieldsFormService->getFieldSimple('name', 'Название', $room->name ?? null, true, Types::CONST_STR));
        $fields->add($this->fieldsFormService->getFieldSimple('electr_points', 'Кол-во электро точек', $room->electr_points ?? null, true, Types::CONST_INT));
        $fields->add($this->fieldsFormService->getFieldCheck('ceiling', 'Натяжной потолок', $room->ceiling ?? false, false));
        $fields->add($this->fieldsFormService->getFieldDict('floor', 'Материал стен', true, 'material_floor', $materialFloorId));

        //Поля только при обновлении
        if($update) {
            $fields->add($this->fieldsFormService->getFieldDict('furnitures', 'Мебель', true, 'furniture', $furnituresIds));
        }

        return $fields;
    }


}
