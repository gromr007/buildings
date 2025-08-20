<?php

declare(strict_types=1);

namespace App\Services\Room;

use App\Data\Forms\ManageParamData;
use App\Data\Room\RoomIndexData;
use App\Data\Room\RoomStoreData;
use App\Data\Room\RoomUpdateData;
use App\Enums\Params\Properties;
use App\Http\Requests\Room\Data\IndexData;
use App\Http\Requests\Room\Data\ManageData;
use App\Http\Requests\Room\Data\ShowData;
use App\Repositories\Room\RoomRepository;
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
        $basicFields = $this->getBasicFields($manageData->params);

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
            ... $this->getBasicFields($manageData->params),
            'house_id' => $manageData->house_id,
            'update_data' => Date::now()
        ]);

        //Подменяем -1
        //$updateData = $this->addAllIdsByDict($updateData);

        $roomData =  $this->roomRepository->updateAndReturn(
            $manageData->room_id,
            $updateData,
        );

        return $roomData;
    }


    /**
     * Берем значения полей, одинаковых для роутов store и update
     * @param Collection<int, ManageParamData>
     * @return array<string, mixed>
     * */
    private function getBasicFields(Collection $params): array
    {
        $props = [];
        foreach(Properties::Room as $propName) {
            $props[$propName] = $this->getAttrFilter($params, $propName);
        }
        return $props;
    }


    /**
     * Берем значение свойства из списка параметров
     * */
    private function getAttrFilter($params, string $attr)
    {
        $filtered = $params->filter(function ($item) use ($attr) {
            return $item->key === $attr;
        });
        if($filtered->isNotEmpty()) {
            return $filtered->first()->value;
        }
    }

}
