<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\Schemas;

use OpenApi\Annotations as OA;

/**
 *
 *
 * @OA\Schema(
 *      schema="Service",
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="газ"),
 *  ),
 *
 * @OA\Schema(
 *      schema="House",
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="floors", type="integer", example=1),
 *      @OA\Property(property="roof", type="string", example="Зеленая"),
 *      @OA\Property(property="address", type="string", example="Гвардейский 32, кв 1"),
 *      @OA\Property(property="garage", type="boolean", example="0"),
 *       @OA\Property(property="created", type="string", example="2025-08-21 09:54:26"),
 *       @OA\Property(property="updated", type="string", example="2025-08-21 09:54:26"),
 *       @OA\Property(
 *          property="wall",
 *          type="object",
 *          @OA\Property(
 *              property="id",
 *              type="integer",
 *              example="2"
 *          ),
 *          @OA\Property(
 *              property="name",
 *              type="string",
 *              example="газоблок"
 *          )
 *       ),
 *       @OA\Property(property="services", type="array", @OA\Items( ref="#/components/schemas/Service")),
 *       @OA\Property(property="rooms", type="array", @OA\Items( ref="#/components/schemas/Room")),
 *  ),
 *
 * @OA\Schema(
 *      schema="HouseSuccessResponse",
 *      @OA\Property(property="status", type="string", example="success"),
 *      @OA\Property(property="message", type="string", example="OK"),
 *      @OA\Property(
 *          property="body",
 *          type="array",
 *          @OA\Items( ref="#/components/schemas/House")
 *      )
 *  )
 */

final readonly class SuccessResponse
{

}
