<?php

declare(strict_types=1);

namespace App\Data\Forms;

use Spatie\LaravelData\{Attributes\MapInputName, Data};

final class ManageParamData extends Data
{
    /** @var int|string */
    public int|string $key;

    /** @var mixed */
    public mixed $value;

}
