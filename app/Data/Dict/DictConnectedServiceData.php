<?php

declare(strict_types=1);

namespace App\Data\Dict;

use App\Models\Dict\DictConnectedService;
use Spatie\LaravelData\Data;

class DictConnectedServiceData extends Data
{
    /** @var int */
    public int $id;

    /** @var string */
    public string $name;


    /**
     * @param DictConnectedService $model
     * @return self
     */
    public static function fromModel(DictConnectedService $model): self
    {
        return self::from([
            'id' => $model->id,
            'name' => $model->name,
        ]);
    }
}
