<?php

declare(strict_types=1);

namespace App\Http\Requests\House;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\CustomRules\HouseFormExists;
use App\Http\Requests\CustomRules\HouseIdExists;
use App\Http\Requests\CustomRules\NotNegativeValidation;
use App\Http\Requests\House\Data\ManageData;

final class UpdateRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'house_id' => [
                'bail',
                'required',
                'integer',
                'min:1',
                app(HouseIdExists::class),
            ],
            'params' => [
                app(HouseFormExists::class)
            ],
            'params.*' => [
                'array',
            ],
            'params.*.key' => [
                'required',
            ],
            'params.*.value' => [
                'required',
                new NotNegativeValidation(),
            ],
        ];
    }

    /**
     * @return ManageData
     */
    public function toData(): ManageData
    {
        return ManageData::from($this->validated());
    }

    /**
     *
     * */
    public function all($keys = null)
    {
        $request = parent::all($keys);

        $request['house_id'] =  (int)$this->route('house_id');

        return $request;
    }
}
