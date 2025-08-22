<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="HouseStoreRequest",
 *       required={"params"},
 *
 *       example={
 *            "params"={
 *                {
 *                    "key"="floors",
 *                    "value"=2
 *                },
 *                {
 *                    "key"="roof",
 *                    "value"="Желтая"
 *                },
 *                {
 *                    "key"="address",
 *                    "value"="Красноармейская 22 кв 3"
 *                },
 *                {
 *                    "key"="garage",
 *                    "value"=1
 *                },
 *                {
 *                    "key"="wall",
 *                    "value"=3
 *                }
 *            }
 *       },
 *
 *       @OA\Property(
 *           property="params",
 *           type="array",
 *           description="Параметры",
 *           @OA\Items(
 *                @OA\Property(
 *                    property="key",
 *                    type="string",
 *                    description="Ключ",
 *                    example="electr_points"
 *                ),
 *
 *                @OA\Property(
 *                    property="value",
 *                    type="mixed",
 *                    description="Значение",
 *                    example="1"
 *                ),
 *           ),
 *       ),
 *
 * )
 */

final readonly class StoreRequest
{

}
