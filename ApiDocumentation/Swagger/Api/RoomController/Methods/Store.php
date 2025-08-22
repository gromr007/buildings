<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Methods;

use OpenApi\Annotations as OA;
final readonly class Store
{
    /**
     * @OA\Post(
     *     path=ROOM_STORE_ROUTE,
     *     summary="Создать объект",
     *     tags={"rooms"},
     *     x={"order": 3, "sort": 10},
     *
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
     *     @OA\RequestBody(
     *         description="Данные для создания",
     *         required=true,
     *         @OA\JsonContent(
     *             ref="#/components/schemas/RoomStoreRequest"
     *         )
     *     ),
     *
     *     @OA\Response(
     *          response="201",
     *          description="Объект создан!",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="Created",
     *                  summary="Объект создан!",
     *                  value=ROOM_CREATED
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
     *
     * )
     *
     *
     * @return void
     */


    public function store(): void
    {
        //
    }
}

