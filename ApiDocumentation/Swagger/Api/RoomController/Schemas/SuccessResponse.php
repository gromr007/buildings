<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Schemas;

use OpenApi\Annotations as OA;

/**
 *
 * @OA\Schema(
 *      schema="Furniture",
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="стол"),
 *  ),
 *
 * @OA\Schema(
 *      schema="Room",
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="Спальня"),
 *      @OA\Property(property="ceiling", type="boolean", example="1"),
 *      @OA\Property(property="electr_points", type="integer", example="2"),
 *       @OA\Property(property="created", type="string", example="2025-08-21 09:54:26"),
 *       @OA\Property(property="updated", type="string", example="2025-08-21 09:54:26"),
 *       @OA\Property(
 *          property="floor",
 *          type="object",
 *          @OA\Property(
 *              property="id",
 *              type="integer",
 *              example="2"
 *          ),
 *          @OA\Property(
 *              property="name",
 *              type="string",
 *              example="ламинат"
 *          )
 *       ),
 *       @OA\Property(property="furnitures", type="array", @OA\Items( ref="#/components/schemas/Furniture")),
 *  ),
 *
 * @OA\Schema(
 *      schema="RoomSuccessResponse",
 *      @OA\Property(property="status", type="string", example="success"),
 *      @OA\Property(property="message", type="string", example="OK"),
 *      @OA\Property(
 *          property="body",
 *          type="array",
 *          @OA\Items( ref="#/components/schemas/Room")
 *      )
 *  )
 */

final readonly class SuccessResponse
{

}
