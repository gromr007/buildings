<?php

declare(strict_types=1);

namespace App\Http\Requests\Room;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\CustomRules\HouseIdExists;
use App\Http\Requests\CustomRules\RoomFormExists;
use App\Http\Requests\CustomRules\NotNegativeValidation;
use App\Http\Requests\Room\Data\ManageData;

final class StoreRequest extends AbstractRequest
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
                app(RoomFormExists::class)
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
