<?php

declare(strict_types=1);

namespace App\Http\Requests\House\Data;

use Spatie\LaravelData\Data;

final class ShowData extends Data
{
    /** @var int */
    public int $house_id;

}
