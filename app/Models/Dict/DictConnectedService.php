<?php

declare(strict_types=1);

namespace App\Models\Dict;

use App\Models\AbstractModel;

/**
 * @property int $id
 * @property string $name
 *
 */
class DictConnectedService extends AbstractModel
{
    /** @var string */
    protected $table = 'dict_connected_services';

    /** @var string[] */
    protected $guarded = ['id'];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;

}
