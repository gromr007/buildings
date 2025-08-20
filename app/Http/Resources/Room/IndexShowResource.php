<?php

declare(strict_types=1);

namespace App\Http\Resources\Room;

use App\Data\Room\RoomIndexData;
use Illuminate\Http\Resources\Json\JsonResource;

final class IndexShowResource extends JsonResource
{
    /**
     * @var RoomIndexData
     */
    public $resource;
}
