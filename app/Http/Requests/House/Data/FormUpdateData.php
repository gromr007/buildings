<?php

declare(strict_types=1);

namespace App\Http\Requests\House\Data;

use Spatie\LaravelData\{Data};

final class FormUpdateData extends Data
{
    public int $house_id;
}
