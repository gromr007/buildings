<?php

declare(strict_types=1);

namespace App\Data\Dict;

use App\Models\Dict\DictMaterialFloor;
use Spatie\LaravelData\Data;

class DictMaterialFloorData extends Data
{
    /** @var int */
    public int $id;

    /** @var string */
    public string $name;


    /**
     * @param DictMaterialFloor $model
     * @return self
     */
    public static function fromModel(DictMaterialFloor $model): self
    {
        return self::from([
            'id' => $model->id,
            'name' => $model->name,
        ]);
    }
}
