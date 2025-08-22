<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Methods;

use OpenApi\Annotations as OA;
final readonly class Index
{
    /**
     * @OA\Get(
     *     path=ROOM_INDEX_ROUTE,
     *     summary="Получить все комнаты",
     *     tags={"rooms"},
     *     x={"order": 1},
     *
     *      @OA\Parameter(
     *          name="house_id",
     *          in="path",
     *          description="Уникальный числовой ID Дома",
     *          required=true,
     *          @OA\Schema(type="integer"),
     *          @OA\Examples(
     *              example="1",
     *              value="1",
     *              summary="1"
     *          )
     *      ),
     *
     *     @OA\Response(
     *         response="200",
     *         description="данные успешно получены",
     *         @OA\JsonContent(ref="#/components/schemas/RoomSuccessResponse")
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
