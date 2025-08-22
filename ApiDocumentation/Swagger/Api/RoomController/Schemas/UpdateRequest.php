<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="RoomUpdateRequest",
 *      required={"params"},
 *
 *      example={
 *           "params"={
 *               {
 *                   "key"="name",
 *                   "value"="Душевая2"
 *               },
 *               {
 *                   "key"="electr_points",
 *                   "value"="3"
 *               },
 *               {
 *                   "key"="ceiling",
 *                   "value"="0"
 *               },
 *               {
 *                   "key"="floor",
 *                   "value"="2"
 *               },
 *               {
 *                   "key"="furnitures",
 *                   "value"={2,3}
 *               }
 *           }
 *      },
 *
 *      @OA\Property(
 *          property="params",
 *          type="array",
 *          description="Параметры",
 *          @OA\Items(
 *               @OA\Property(
 *                   property="key",
 *                   type="string",
 *                   description="Ключ",
 *                   example="electr_points"
 *               ),
 *
 *               @OA\Property(
 *                   property="value",
 *                   type="mixed",
 *                   description="Значение",
 *                   example="1"
 *               ),
 *          ),
 *      ),
 *
 * )
 */

final readonly class UpdateRequest
{

}
