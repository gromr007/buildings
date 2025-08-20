<?php

declare(strict_types=1);

namespace App\Data\House;

use Carbon\Carbon;
use App\Data\Casts\DateTimeIso8601Cast;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\{Attributes\MapInputName, Attributes\MapOutputName, Data};
use Spatie\LaravelData\Attributes\WithCast;

class HouseUpdateData extends Data
{
    /** @var int */
    #[MapInputName('floors')]
    #[MapOutputName('number_of_floors')]
    public int $number_of_floors;

    /** @var string|null */
    #[MapInputName('roof')]
    #[MapOutputName('roof_color')]
    public ?string $roof_color = null;

    /** @var string|null */
    #[MapOutputName('address')]
    public ?string $address = null;

    /** @var ?bool */
    #[MapInputName('garage')]
    #[MapOutputName('built_in_garage')]
    public ?bool $built_in_garage = false;

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
    #[MapInputName('wall')]
    #[MapOutputName('material_wall_id')]
    public int $material_wall;

    /** @var array<int, int> */
    #[MapInputName('services')]
    #[MapOutputName('connected_services')]
    public array $connected_services = [];

}
