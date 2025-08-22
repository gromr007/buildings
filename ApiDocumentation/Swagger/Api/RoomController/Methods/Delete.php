<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Methods;

use OpenApi\Annotations as OA;

final readonly class Delete
{
    /**
     * @OA\Delete(
     *     path=ROOM_DELETE_ROUTE,
     *     summary="Удалить один объект по ID",
     *     tags={"rooms"},
     *     x={"order": 5},
     *
     *       @OA\Parameter(
     *           name="house_id",
     *           in="path",
     *           description="Уникальный числовой ID Дома",
     *           required=true,
     *           @OA\Schema(type="integer"),
     *           @OA\Examples(
     *               example="1",
     *               value="1",
     *               summary="1"
     *           )
     *       ),
     *
     *       @OA\Parameter(
     *           name="room_id",
     *           in="path",
     *           description="Уникальный числовой ID комнаты",
     *           required=true,
     *           @OA\Schema(type="integer"),
     *           @OA\Examples(
     *               example="1",
     *               value="1",
     *               summary="1"
     *           )
     *       ),
     *
     *     @OA\Response(
     *         response=422,
     *         description="Ошибки валидации",
     *         @OA\JsonContent(
     *         )
     *     ),
     *
     * )
     * @return void
     */
    public function index(): void
    {
        //
    }
}
