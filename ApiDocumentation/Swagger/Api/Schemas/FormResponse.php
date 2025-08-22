<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\Schemas;

/**
 *
 *
 * @OA\Schema(
 *      schema="Option",
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="name", type="string", example="Кирпич"),
 *  ),
 *
 * @OA\Schema(
 *      schema="Field",
 *      @OA\Property(property="attr", type="string", example="services"),
 *      @OA\Property(property="name", type="string", example="Подключенные сервисы"),
 *      @OA\Property(property="description", type="string", example=""),
 *      @OA\Property(property="value", type="mixed", example=""),
 *      @OA\Property(property="is_required", type="boolean", example="1"),
 *      @OA\Property(property="type", type="string", example="integer"),
 *      @OA\Property(property="dict_id", type="integer", example="1"),
 *      @OA\Property(property="dict_table", type="string", example="services"),
 *      @OA\Property(property="dict_options", type="array", @OA\Items( ref="#/components/schemas/Option")),
 *  ),
 *
 * @OA\Schema(
 *      schema="FormResponse",
 *      @OA\Property(property="status", type="string", example="success"),
 *      @OA\Property(property="message", type="string", example="OK"),
 *      @OA\Property(
 *          property="body",
 *          type="array",
 *          @OA\Items( ref="#/components/schemas/Field")
 *      )
 *  )
 */

final readonly class FormResponse
{

}
