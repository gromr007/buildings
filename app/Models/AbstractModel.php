<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

abstract class AbstractModel extends Model
{
    /**
     * @return string
     */
    public static function getTableName(): string
    {
        return (new static())->getTable();
    }


    /**
     * @return string
     */
    public static function getPrimaryKey(): string
    {
        $primary = (new static())->getKeyName();

        return $primary;
    }

}
