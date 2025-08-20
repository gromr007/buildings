<?php

declare(strict_types=1);

namespace App\Data\Dict;

use App\Models\Dict\DictMaterialWall;
use Spatie\LaravelData\Data;

class DictMaterialWallData extends Data
{
    /** @var int */
    public int $id;

    /** @var string */
    public string $name;


    /**
     * @param DictMaterialWall $model
     * @return self
     */
    public static function fromModel(DictMaterialWall $model): self
    {
        return self::from([
            'id' => $model->id,
            'name' => $model->name,
        ]);
    }
}
