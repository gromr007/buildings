<?php

declare(strict_types=1);

namespace App\Data\Room;

use Carbon\Carbon;
use App\Data\Casts\DateTimeIso8601Cast;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\{Attributes\MapInputName, Attributes\MapOutputName, Data};
use Spatie\LaravelData\Attributes\WithCast;

class RoomUpdateData extends Data
{
    /** @var string|null */
    #[MapInputName('name')]
    #[MapOutputName('name')]
    public ?string $name = null;

    /** @var int */
    #[MapInputName('electr_points')]
    #[MapOutputName('numb_electr_points')]
    public int $electr_points;

    /** @var ?bool */
    #[MapInputName('ceiling')]
    #[MapOutputName('suspended_ceiling')]
    public ?bool $suspended_ceiling = false;

    /** @var string|Carbon|CarbonImmutable */
    #[MapInputName('created')]
    #[MapOutputName('created_at')]
    #[WithCast(castClass: DateTimeIso8601Cast::class)]
    public string|Carbon|CarbonImmutable $create_date;

    /** @var string|Carbon|CarbonImmutable */
    #[MapInputName('updated')]
    #[MapOutputName('updated_at')]
    #[WithCast(castClass: DateTimeIso8601Cast::class)]
    public string|Carbon|CarbonImmutable $update_data;

    /** @var int */
    #[MapInputName('floor')]
    #[MapOutputName('material_floor_id')]
    public int $material_floor;

    /** @var array<int, int> */
    #[MapInputName('furnitures')]
    #[MapOutputName('furnitures')]
    public array $furnitures = [];

    /** @var int */
    #[MapInputName('house_id')]
    #[MapOutputName('house_id')]
    public int $house;

}
