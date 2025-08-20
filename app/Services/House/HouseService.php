<?php

declare(strict_types=1);

namespace App\Services\House;

use App\Data\Forms\ManageParamData;
use App\Data\House\HouseIndexData;
use App\Data\House\HouseStoreData;
use App\Data\House\HouseUpdateData;
use App\Enums\Params\Properties;
use App\Http\Requests\House\Data\IndexData;
use App\Http\Requests\House\Data\ManageData;
use App\Http\Requests\House\Data\ShowData;
use App\Repositories\House\HouseRepository;
use Throwable;
use App\Utils\Date;
use Illuminate\Support\{Collection, Str};

final readonly class HouseService
{
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
        $basicFields = $this->getBasicFields($manageData->params);

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
            ... $this->getBasicFields($manageData->params),

            'update_data' => Date::now()
        ]);

        //Подменяем -1
        //$updateData = $this->addAllIdsByDict($updateData);

        $houseData =  $this->houseRepository->updateAndReturn(
            $manageData->house_id,
            $updateData,
        );

        return $houseData;
    }


    /**
     * Берем значения полей, одинаковых для роутов store и update
     * @param Collection<int, ManageParamData>
     * @return array<string, mixed>
     * */
    private function getBasicFields(Collection $params): array
    {
        $props = [];
        foreach(Properties::House as $propName) {
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
