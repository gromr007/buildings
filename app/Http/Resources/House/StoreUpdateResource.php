<?php

declare(strict_types=1);

namespace App\Http\Resources\House;

use App\Data\House\HouseIndexData;
use Illuminate\Http\Resources\Json\JsonResource;

final class StoreUpdateResource extends JsonResource
{
    /**
     * @var HouseIndexData
     */
    public $resource;
}
