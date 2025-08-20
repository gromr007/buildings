<?php

declare(strict_types=1);

namespace App\Http\Requests\Room;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\CustomRules\HouseIdExists;
use App\Http\Requests\Room\Data\FormCreateData;

class FormCreateRequest extends AbstractRequest
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

        ];
    }

    /**
     * @return FormCreateData
     */
    public function toData(): FormCreateData
    {
        return FormCreateData::from($this->validated());
    }


    /**
     * @return array
     * */
    public function all($keys = null): array
    {
        $request = parent::all($keys);

        $request['house_id'] =  (int)$this->route('house_id');

        return $request;
    }
}
