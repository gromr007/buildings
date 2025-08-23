<?php

declare(strict_types=1);

namespace App\Services\Room;

use App\Data\Room\RoomIndexData;
use App\Data\Room\RoomStoreData;
use App\Data\Room\RoomUpdateData;
use App\Http\Requests\Room\Data\IndexData;
use App\Http\Requests\Room\Data\ManageData;
use App\Http\Requests\Room\Data\ShowData;
use App\Repositories\Room\RoomRepository;
use App\Services\Fields\FieldsService;
use Throwable;
use App\Utils\Date;
use Illuminate\Support\{Collection, Str};

final readonly class RoomService
{
    public function __construct(
        private RoomRepository $roomRepository,
    ) {
        //
    }

    /**
     * @param IndexData $request
     * @return Collection<int, RoomIndexData>
     */
    public function all(IndexData $request): Collection
    {
        // Берем все данные
        $dataBd = $this->roomRepository->getAll();

        return RoomIndexData::collect($dataBd);
    }

    /**
     * @param ShowData $data
     * @return RoomIndexData
     */
    public function findById(ShowData $data): RoomIndexData
    {
        return RoomIndexData::fromModel(
            $this->roomRepository->findById($data->room_id)
        );
    }


    /**
     * @param ShowData $data
     * @return void
     * @throws Throwable
     */
    public function delete(ShowData $data): void
    {
        $this->roomRepository->delete($data->room_id);
    }


    /**
     * @param ManageData $manageData
     * @return RoomIndexData
     * @throws Throwable
     */
    public function createAndReturn(ManageData $manageData): RoomIndexData
    {
        $basicFields = FieldsService::getBasicFields($manageData->params, 'Room');

        $storeData = RoomStoreData::from([
            ... $basicFields,
            'house_id' => $manageData->house_id,
            'create_date' => Date::now(),
            'update_date' => Date::now()
        ]);

        //Создаем
        $roomData = $this->roomRepository->createAndReturn(
            $storeData
        );

        return $roomData;
    }


    /**
     * @param ManageData $manageData
     * @return RoomIndexData
     * @throws Throwable
     */
    public function updateAndReturn(ManageData $manageData): RoomIndexData
    {
        $updateData = RoomUpdateData::from([
            ... FieldsService::getBasicFields($manageData->params, 'Room'),
            'house_id' => $manageData->house_id,
            'update_data' => Date::now()
        ]);

        $roomData =  $this->roomRepository->updateAndReturn(
            $manageData->room_id,
            $updateData,
        );

        return $roomData;
    }

}
