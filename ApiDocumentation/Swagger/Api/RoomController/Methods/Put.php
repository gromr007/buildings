<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Methods;

use OpenApi\Annotations as OA;
final readonly class Put
{
    /**
     * @OA\Put(
     *     path=ROOM_UPDATE_ROUTE,
     *     summary="Обновить один объект по ID",
     *     tags={"rooms"},
     *     x={"order": 4},
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
     *      @OA\Parameter(
     *          name="room_id",
     *          in="path",
     *          description="Уникальный числовой ID комнаты",
     *          required=true,
     *          @OA\Schema(type="integer"),
     *          @OA\Examples(
     *              example="1",
     *              value="1",
     *              summary="1"
     *          )
     *      ),
     *
     *     @OA\RequestBody(
     *         description="Данные для обновления",
     *         required=true,
     *         @OA\JsonContent(
     *             ref="#/components/schemas/RoomUpdateRequest"
     *         )
     *     ),
     *
     *     @OA\Response(
     *          response="200",
     *          description="Объект обновлен!",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="Updated",
     *                  summary="Объект обновлен!",
     *                  value=ROOM_UPDATED
     *              )
     *          )
     *     ),
     *
     *     @OA\Response(
     *         response=422,
     *         description="Ошибки валидации",
     *         @OA\JsonContent(
     *             @OA\Examples(
     *                 example="StoreValidationError",
     *                 ref="#/components/examples/StoreValidationError"
     *             )
     *         )
     *     ),
     * )
     *
     * @return void
     */
    public function index(): void
    {
        //
    }
}
