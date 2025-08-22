<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Methods;

use OpenApi\Annotations as OA;
final readonly class Show
{
    /**
     * @OA\Get(
     *     path=ROOM_SHOW_ROUTE,
     *     summary="Получить один объект по ID",
     *     tags={"rooms"},
     *     x={"order": 2},
     *
     *     @OA\Parameter(
     *         name="house_id",
     *         in="path",
     *         description="Уникальный числовой ID Дома",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(
     *             example="1",
     *             value="1",
     *             summary="1"
     *         )
     *     ),
     *
     *     @OA\Parameter(
     *         name="room_id",
     *         in="path",
     *         description="Уникальный числовой ID комнаты",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(
     *             example="1",
     *             value="1",
     *             summary="1"
     *         )
     *     ),
     *
     *
     *     @OA\Response(
     *          response="200",
     *          description="Объект успешно получен",
     *           @OA\JsonContent(
     *               @OA\Examples(
     *                   example="Updated",
     *                   summary="Объект обновлен!",
     *                   value=ROOM_UPDATED
     *               )
     *           )
     *     ),
     *      @OA\Response(
     *            response="404",
     *            ref="#/components/responses/404"
     *        )
     * )
     * @return void
     */
    public function index(): void
    {
        //
    }
}
