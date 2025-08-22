<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\Methods;

use OpenApi\Annotations as OA;
final readonly class Put
{
    /**
     * @OA\Put(
     *     path=HOUSE_UPDATE_ROUTE,
     *     summary="Обновить один объект по ID",
     *     tags={"houses"},
     *     x={"order": 4},
     *
     *     @OA\Parameter(
     *          name="house_id",
     *          in="path",
     *          description="Уникальный числовой ID конкретного объекта",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *
     *     @OA\RequestBody(
     *         description="Данные для обновления",
     *         required=true,
     *         @OA\JsonContent(
     *             ref="#/components/schemas/HouseUpdateRequest"
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
     *                  value=HOUSE_UPDATED
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
