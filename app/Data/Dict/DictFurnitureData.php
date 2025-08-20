<?php

declare(strict_types=1);

namespace App\Data\Dict;

use App\Models\Dict\DictFurniture;
use Spatie\LaravelData\Data;

class DictFurnitureData extends Data
{
    /** @var int */
    public int $id;

    /** @var string */
    public string $name;


    /**
     * @param DictFurniture $model
     * @return self
     */
    public static function fromModel(DictFurniture $model): self
    {
        return self::from([
            'id' => $model->id,
            'name' => $model->name,
        ]);
    }
}
