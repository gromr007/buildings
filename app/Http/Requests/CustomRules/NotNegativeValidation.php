<?php

declare(strict_types=1);

namespace App\Http\Requests\CustomRules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final readonly class NotNegativeValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_null($value)) {
            return;
        }

        if (is_numeric($value) && $value < 0) {
            $fail(':attribute должно быть больше нуля.');
        }
    }
}
