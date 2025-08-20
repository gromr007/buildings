<?php

declare(strict_types=1);

namespace App\Http\Requests\CustomRules;

use App\Services\Dict\DictService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class DictFurnitureExists implements ValidationRule
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
        //Для выбора всех значений
        if((int)$value == -1) {
            return;
        }
        if ($this->dictService->existsById((int)$value, 'furniture') === false) {
            $fail(':attribute ('.$value.') отсутствует в БД.');
        }
    }
}
