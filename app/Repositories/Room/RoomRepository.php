<?php

declare(strict_types=1);

namespace App\Repositories\Room;

use App\Data\Room\RoomIndexData;
use App\Data\Room\RoomStoreData;
use App\Data\Room\RoomUpdateData;
use App\Models\Room\Room;
use App\Utils\Date;
use Illuminate\Support\Str;
use Throwable;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Utils\DbTransactionManager;


final class RoomRepository
{
    const GET_ROOM_WITH_CONST = [
        'dictMaterialFloor',
        'dictFurnitures',
    ];

    /**
     * @param DbTransactionManager $dbTransactionManager
     */
    public function __construct(
        private readonly DbTransactionManager $dbTransactionManager
    )
    {
        //
    }


    /**
     * @return Collection<int, Room>
     */
    public function getAll(): Collection
    {
        return Room::query()
            ->with(relations: self::GET_ROOM_WITH_CONST)
            ->get();

    }


    /**
     * @param int $id
     * @return bool
     */
    public function existsById(int $id): bool
    {
        return Room::query()->where('id', $id)->exists();
    }


    /**
     * @param int $roomId
     * @return Room
     */
    public function findById(int $roomId): Room
    {
        return Room::query()
            ->where('id', $roomId)
            ->with(relations: self::GET_ROOM_WITH_CONST)
            ->firstOrFail();
    }


    /**
     * @param int $roomId
     * @return void
     * @throws Throwable
     */
    public function delete(int $roomId): void
    {
        $model = Room::query()->findOrFail($roomId);

        if ($model->id == $roomId) {
            $model->delete();
        }
    }


    /**
     * @param RoomStoreData $storeData
     * @return RoomIndexData
     * @throws Throwable
     */
    public function createAndReturn(RoomStoreData $storeData): RoomIndexData
    {
        $model = null;
        $this->dbTransactionManager->wrap(function () use ($storeData, &$model) {
            $model = Room::query()->create(
                $storeData->toArray()
            )->load(self::GET_ROOM_WITH_CONST);
        });
        return RoomIndexData::fromModel($model);
    }

    /**
     * @param int $roomId
     * @param RoomUpdateData $updateData
     * @return RoomIndexData
     * @throws Throwable
     */
    public function updateAndReturn(
        int $roomId,
        RoomUpdateData $updateData,
    ): RoomIndexData
    {
        $model = Room::query()->findOrFail($roomId);
        $this->dbTransactionManager->wrap(function () use ($updateData, &$model) {

            $model->update(
                $updateData->toArray()
            );

            $model->dictFurnitures()->sync(
                $updateData->furnitures
            );

            $model->load(self::GET_ROOM_WITH_CONST);
        });

        return RoomIndexData::fromModel($model);
    }


    /**
     * @param int $houseId
     * @param int $roomId
     * @return bool
     */
    public function bandByHouse(int $houseId, int $roomId): bool
    {
        return Room::query()
            ->where('house_id', $houseId)
            ->where('id', $roomId)
            ->exists();
    }

}
