<?php

declare(strict_types=1);


namespace App\Http\Requests\CustomRules;

use App\Http\Requests\House\PropertiesRequest;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final readonly class HouseFormExists implements ValidationRule
{
    /**
     */
    public function __construct()
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
        $request = request();

        // Изменяем входные данные
        foreach ($value as $item) {
            if (!is_numeric($item['key'])) {
                $request->merge([$item['key'] => $item['value']]);
            }
        }

        //Запускаем валидацию
        app(PropertiesRequest::class)->validated();
    }
}
