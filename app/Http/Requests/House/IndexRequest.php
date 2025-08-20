<?php

declare(strict_types=1);

namespace App\Http\Requests\House;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\House\Data\IndexData;

final class IndexRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [

        ];
    }

    /**
     * @return IndexData
     */
    public function toData(): IndexData
    {
        return IndexData::from($this->validated());
    }


}
