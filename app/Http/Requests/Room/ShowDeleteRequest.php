<?php

declare(strict_types=1);

namespace App\Http\Requests\Room;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\CustomRules\HouseIdExists;
use App\Http\Requests\CustomRules\RoomIdExists;
use App\Http\Requests\CustomRules\RoomInHouseExists;
use App\Http\Requests\Room\Data\ShowData;

final class ShowDeleteRequest extends AbstractRequest
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
            'room_id' => [
                'bail',
                'required',
                'integer',
                'min:1',
                app(RoomIdExists::class),
                app(RoomInHouseExists::class),
            ],
        ];
    }


    /**
     * @return ShowData
     */
    public function toData(): ShowData
    {
        return ShowData::from($this->validated());
    }


    /**
     * @return array
     * */
    public function all($keys = null) : array
    {
        $request = parent::all($keys);

        $request['house_id'] =  (int)$this->route('house_id');
        $request['room_id'] =  (int)$this->route('room_id');

        return $request;
    }
}
