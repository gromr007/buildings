<?php

declare(strict_types=1);

namespace App\Data\House;

use App\Data\Dict\DictConnectedServiceData;
use App\Data\Dict\DictMaterialWallData;
use App\Models\House\House;
use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;

class HouseForFormData extends Data
{
    /** @var int */
    public int $id;

    /** @var int */
    public int $floors;

    /** @var string */
    public string $roof;

    /** @var string */
    public string $address;

    /** @var bool|null */
    public ?bool $garage = false;

    /** @var string|null  */
    public ?string $created;

    /** @var string|null  */
    public ?string $updated;

    /** @var DictMaterialWallData|null */
    public ?DictMaterialWallData $wall;

    /** @var Collection<int, DictConnectedServiceData>|null */
    public ?Collection $services;


    /**
     * @param House $house
     * @return self
     */
    public static function fromModel(House $house): self
    {
        return self::from([
            'id' => $house->id,
            'floors' => $house->number_of_floors,
            'roof' => $house->roof_color,
            'address' => $house->address,
            'garage' => $house->built_in_garage,
            'created' => $house->created_at,
            'updated' => $house->updated_at,
            'wall' => $house->relationLoaded(key: 'dictMaterialWall')
                ? DictMaterialWallData::fromModel($house->dictMaterialWall)
                : null,
            'services' => $house->relationLoaded(key: 'dictConnectedServices')
                ? DictConnectedServiceData::collect($house->dictConnectedServices)
                : null,
        ]);
    }
}
