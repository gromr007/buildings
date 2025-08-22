<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="RoomStoreRequest",
 *     required={"params"},
 *
 *     example={
 *          "params"={
 *              {
 *                  "key"="name",
 *                  "value"="Душевая"
 *              },
 *              {
 *                  "key"="electr_points",
 *                  "value"="2"
 *              },
 *              {
 *                  "key"="ceiling",
 *                  "value"="1"
 *              },
 *              {
 *                  "key"="floor",
 *                  "value"="3"
 *              }
 *          }
 *     },
 *
 *     @OA\Property(
 *         property="params",
 *         type="array",
 *         description="Параметры",
 *         @OA\Items(
 *              @OA\Property(
 *                  property="key",
 *                  type="string",
 *                  description="Ключ",
 *                  example="electr_points"
 *              ),
 *
 *              @OA\Property(
 *                  property="value",
 *                  type="mixed",
 *                  description="Значение",
 *                  example="1"
 *              ),
 *         ),
 *     ),
 *
 * )
 */

final readonly class StoreRequest
{

}
