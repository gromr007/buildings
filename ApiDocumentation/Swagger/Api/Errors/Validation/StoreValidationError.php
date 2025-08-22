<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\Errors\Validation;

/**
 * @OA\Examples(
 *     example="StoreValidationError",
 *     summary="Пример возможных ошибок валидации",
 *     value={
 *         "message": "The given data was invalid.",
 *         "errors": {
 *             "name": {
 *                 "Поле name обязательно для заполнения.",
 *                 "Поле name должно быть строкой.",
 *                 "Поле name должно содержать минимум 1 символ."
 *             },
 *         }
 *     }
 * )
 */
final readonly class StoreValidationError
{
    //
}
