<?php

declare(strict_types=1);

namespace App\Models\Dict;

use App\Models\AbstractModel;

/**
 * @property int $id
 * @property string $name
 *
 */
class DictMaterialFloor extends AbstractModel
{
    /** @var string */
    protected $table = 'dict_material_floor';

    /** @var string[] */
    protected $guarded = ['id'];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;

}
