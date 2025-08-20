<?php

declare(strict_types=1);

namespace App\Http\Requests\Room;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\CustomRules\DictFurnitureExists;
use App\Http\Requests\CustomRules\DictMaterialFloorExists;

final class PropertiesRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [

            'name' => [
                'bail',
                'required',
                'string',
            ],

            'electr_points' => [
                'bail',
                'integer',
                'min:1',
            ],

            'ceiling' => [
                'bail',
                'integer',
                'min:0',
                'max:1'
            ],

            'floor' => [
                'bail',
                'integer',
                'min:1',
                app(DictMaterialFloorExists::class),
            ],

            'furnitures' => [
                'bail',
                'array',
            ],

            'furnitures.*' => [
                'bail',
                'integer',
                'min:-1',
                app(DictFurnitureExists::class),
            ],
        ];
    }

}
