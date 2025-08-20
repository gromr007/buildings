<?php

declare(strict_types=1);

namespace App\Repositories\House;

use App\Data\House\HouseIndexData;
use App\Data\House\HouseStoreData;
use App\Data\House\HouseUpdateData;
use App\Models\House\House;
use App\Utils\Date;
use Illuminate\Support\Str;
use Throwable;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Utils\DbTransactionManager;


final class HouseRepository
{
    const GET_HOUSE_WITH_CONST = [
        'dictMaterialWall',
        'dictConnectedServices',
        'rooms.dictMaterialFloor',
        'rooms.dictFurnitures',
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
     * @return Collection<int, House>
     */
    public function getAll(): Collection
    {
        return House::query()
            ->with(relations: self::GET_HOUSE_WITH_CONST)
            ->get();

    }


    /**
     * @param int $id
     * @return bool
     */
    public function existsById(int $id): bool
    {
        return House::query()->where('id', $id)->exists();
    }


    /**
     * @param int $houseId
     * @return House
     */
    public function findById(int $houseId): House
    {
        return House::query()
            ->where('id', $houseId)
            ->with(relations: self::GET_HOUSE_WITH_CONST)
            ->firstOrFail();
    }


    /**
     * @param int $houseId
     * @return void
     * @throws Throwable
     */
    public function delete(int $houseId): void
    {
        $model = House::query()->findOrFail($houseId);

        if ($model->id == $houseId) {
            $model->delete();
        }
    }


    /**
     * @param HouseStoreData $storeData
     * @return HouseIndexData
     * @throws Throwable
     */
    public function createAndReturn(HouseStoreData $storeData): HouseIndexData
    {
        $model = null;
        $this->dbTransactionManager->wrap(function () use ($storeData, &$model) {
            $model = House::query()->create(
                $storeData->toArray()
            )->load(self::GET_HOUSE_WITH_CONST);
        });
        return HouseIndexData::fromModel($model);
    }

    /**
     * @param int $houseId
     * @param HouseUpdateData $updateData
     * @return HouseIndexData
     * @throws Throwable
     */
    public function updateAndReturn(
        int $houseId,
        HouseUpdateData $updateData,
    ): HouseIndexData
    {
        $model = House::query()->findOrFail($houseId);
        $this->dbTransactionManager->wrap(function () use ($updateData, &$model) {

            $model->update(
                $updateData->toArray()
            );

            $model->dictConnectedServices()->sync(
                $updateData->connected_services
            );

            $model->load(self::GET_HOUSE_WITH_CONST);
        });

        return HouseIndexData::fromModel($model);
    }

}
