<?php

declare(strict_types=1);

namespace App\Http\Requests\House;

use App\Http\Requests\AbstractRequest;
use App\Http\Requests\House\Data\FormCreateData;

class FormCreateRequest extends AbstractRequest
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
     * @return FormCreateData
     */
    public function toData(): FormCreateData
    {
        return FormCreateData::from($this->validated());
    }

}
