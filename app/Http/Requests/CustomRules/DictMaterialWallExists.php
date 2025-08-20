<?php

declare(strict_types=1);

namespace App\Http\Requests\CustomRules;

use App\Services\Dict\DictService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class DictMaterialWallExists implements ValidationRule
{

    /**
     * @param DictService $dictService
     */
    public function __construct(
        private readonly DictService $dictService
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
        if ($this->dictService->existsById((int)$value, 'material_wall') === false) {
            $fail(':attribute ('.$value.') отсутствует в БД.');
        }
    }
}
