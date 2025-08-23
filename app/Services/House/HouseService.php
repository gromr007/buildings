<?php

declare(strict_types=1);

namespace App\Services\House;

use App\Data\House\HouseIndexData;
use App\Data\House\HouseStoreData;
use App\Data\House\HouseUpdateData;
use App\Http\Requests\House\Data\IndexData;
use App\Http\Requests\House\Data\ManageData;
use App\Http\Requests\House\Data\ShowData;
use App\Repositories\House\HouseRepository;
use App\Services\Fields\FieldsService;
use Throwable;
use App\Utils\Date;
use Illuminate\Support\{Collection, Str};

final readonly class HouseService
{
    /**
     *
     * */
    public function __construct(
        private HouseRepository $houseRepository,
    ) {
        //
    }

    /**
     * @param IndexData $request
     * @return Collection<int, HouseIndexData>
     */
    public function all(IndexData $request): Collection
    {
        // Берем все данные
        $dataBd = $this->houseRepository->getAll();

        return HouseIndexData::collect($dataBd);
    }

    /**
     * @param ShowData $data
     * @return HouseIndexData
     */
    public function findById(ShowData $data): HouseIndexData
    {
        return HouseIndexData::fromModel(
            $this->houseRepository->findById($data->house_id)
        );
    }


    /**
     * @param ShowData $data
     * @return void
     * @throws Throwable
     */
    public function delete(ShowData $data): void
    {
        $this->houseRepository->delete($data->house_id);
    }


    /**
     * @param ManageData $manageData
     * @return HouseIndexData
     * @throws Throwable
     */
    public function createAndReturn(ManageData $manageData): HouseIndexData
    {
        $basicFields = FieldsService::getBasicFields($manageData->params, 'House');

        $storeData = HouseStoreData::from([
            ... $basicFields,
            'create_date' => Date::now(),
            'update_date' => Date::now()
        ]);

        //Создаем
        $houseData = $this->houseRepository->createAndReturn(
            $storeData
        );

        return $houseData;
    }


    /**
     * @param ManageData $manageData
     * @return HouseIndexData
     * @throws Throwable
     */
    public function updateAndReturn(ManageData $manageData): HouseIndexData
    {
        $updateData = HouseUpdateData::from([
            ... FieldsService::getBasicFields($manageData->params, 'House'),

            'update_data' => Date::now()
        ]);

        $houseData =  $this->houseRepository->updateAndReturn(
            $manageData->house_id,
            $updateData,
        );

        return $houseData;
    }


}
