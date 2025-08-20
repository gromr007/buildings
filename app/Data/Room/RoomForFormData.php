<?php

declare(strict_types=1);

namespace App\Data\Room;

use App\Data\Dict\DictConnectedServiceData;
use App\Data\Dict\DictFurnitureData;
use App\Data\Dict\DictMaterialFloorData;
use App\Models\Room\Room;
use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;

class RoomForFormData extends Data
{
    /** @var int */
    public int $id;

    /** @var string */
    public string $name;

    /** @var int */
    public int $electr_points;

    /** @var bool|null */
    public ?bool $ceiling = false;

    /** @var string|null  */
    public ?string $created;

    /** @var string|null  */
    public ?string $updated;

    /** @var DictMaterialFloorData|null */
    public ?DictMaterialFloorData $floor;

    /** @var Collection<int, DictFurnitureData>|null */
    public ?Collection $furnitures;


    /**
     * @param Room $room
     * @return self
     */
    public static function fromModel(Room $room): self
    {
        return self::from([
            'id' => $room->id,
            'name' => $room->name,
            'electr_points' => $room->numb_electr_points,
            'ceiling' => $room->suspended_ceiling,
            'created' => $room->created_at,
            'updated' => $room->updated_at,
            'floor' => $room->relationLoaded(key: 'dictMaterialFloor')
                ? DictMaterialFloorData::fromModel($room->dictMaterialFloor)
                : null,
            'furnitures' => $room->relationLoaded(key: 'dictFurnitures')
                ? DictConnectedServiceData::collect($room->dictFurnitures)
                : null,
        ]);
    }
}
