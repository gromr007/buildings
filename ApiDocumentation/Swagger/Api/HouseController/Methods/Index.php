<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\Methods;

use OpenApi\Annotations as OA;
final readonly class Index
{
    /**
     * @OA\Get(
     *     path=HOUSE_INDEX_ROUTE,
     *     summary="Получить все дома",
     *     tags={"houses"},
     *     x={"order": 1},
     *
     *     @OA\Response(
     *         response="200",
     *         description="данные успешно получены",
     *         @OA\JsonContent(ref="#/components/schemas/HouseSuccessResponse")
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Ошибка запроса",
     *         @OA\Property(property="status", type="string", example="error"),
     *         @OA\Property(property="code", type="integer", example="400"),
     *         @OA\Property(property="message", type="string", example="Неправильный урл!")
     *     )
     * )
     * @return void
     */
    public function index(): void
    {
        //
    }
}
