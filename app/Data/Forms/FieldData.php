<?php

declare(strict_types=1);

namespace App\Data\Forms;

use Spatie\LaravelData\Data;
use Illuminate\Support\Collection;

final class FieldData extends Data
{
    /** @var string|null */
    public ?string $attr;

    /** @var string|null */
    public ?string $name;

    /** @var string|null */
    public ?string $description;

    /** @var mixed */
    public mixed $value;

    /** @var bool */
    public ?bool $is_required = false;

    /** @var string */
    public string $type;

    /** @var mixed */
    public mixed $dict_id;

    /** @var string|null */
    public ?string $dict_table;

    /** @var Collection<string, mixed>|null */
    public ?Collection $dict_options;

}
