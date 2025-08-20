<?php

declare(strict_types=1);

namespace App\Http\Requests\Room;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\CustomRules\HouseIdExists;
use App\Http\Requests\Room\Data\IndexData;

final class IndexRequest extends AbstractRequest
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
     * @return IndexData
     */
    public function toData(): IndexData
    {
        return IndexData::from($this->validated());
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
