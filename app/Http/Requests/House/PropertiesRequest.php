<?php

declare(strict_types=1);

namespace App\Http\Requests\House;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\CustomRules\DictConnectedServiceExists;
use App\Http\Requests\CustomRules\DictMaterialWallExists;

final class PropertiesRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [

            'floors' => [
                'bail',
                'required',
                'integer',
                'min:1'
            ],

            'roof' => [
                'bail',
                'required',
                'string',
            ],

            'address' => [
                'bail',
                'required',
                'string',
            ],

            'garage' => [
                'bail',
                'integer',
                'min:0',
                'max:1'
            ],

            'wall' => [
                'bail',
                'integer',
                'min:1',
                app(DictMaterialWallExists::class),
            ],

            'services' => [
                'bail',
                'array',
            ],

            'services.*' => [
                'bail',
                'integer',
                'min:-1',
                app(DictConnectedServiceExists::class),
            ],
        ];
    }

}
