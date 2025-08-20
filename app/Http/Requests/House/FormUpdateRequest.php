<?php

declare(strict_types=1);

namespace App\Http\Requests\House;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\CustomRules\HouseIdExists;
use App\Http\Requests\House\Data\FormUpdateData;

class FormUpdateRequest extends AbstractRequest
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
     * @return FormUpdateData
     */
    public function toData(): FormUpdateData
    {
        return FormUpdateData::from($this->validated());
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
