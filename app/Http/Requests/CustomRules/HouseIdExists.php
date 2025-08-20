<?php

declare(strict_types=1);

namespace App\Http\Requests\CustomRules;

use App\Repositories\House\HouseRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class HouseIdExists implements ValidationRule
{

    /**
     * @param HouseRepository $repository
     */
    public function __construct(
        private readonly HouseRepository $repository
    )
    {
        //
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->repository->existsById(id: (int)$value) === false) {
            $fail(':attribute ('.$value.') отсутствует в БД.');
        }
    }
}
