<?php

declare(strict_types=1);

namespace App\Http\Requests\Room\Data;

use App\Data\Forms\ManageParamData;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

final class ManageData extends Data
{
    /** @var int */
    public int $house_id;

    /** @var int */
    public int $room_id;

    /** @var Collection<int, ManageParamData> */
    public Collection $params;
}
