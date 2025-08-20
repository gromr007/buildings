<?php

declare(strict_types=1);

namespace App\Models\Dict;

use App\Models\AbstractModel;

/**
 * @property int $id
 * @property string $name
 *
 */
class DictFurniture extends AbstractModel
{
    /** @var string */
    protected $table = 'dict_furnitures';

    /** @var string[] */
    protected $guarded = ['id'];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;

}
