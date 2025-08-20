<?php

declare(strict_types=1);

namespace App\Http\Requests\Room\Data;

use Spatie\LaravelData\Data;

final class IndexData extends Data
{
    public int $house_id;
}
