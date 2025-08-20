<?php

declare(strict_types=1);

namespace App\Http\Requests\Room\Data;

use Spatie\LaravelData\{Data};

final class FormUpdateData extends Data
{
    public int $house_id;
    public int $room_id;
}
