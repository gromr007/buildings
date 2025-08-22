<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\Methods;

use OpenApi\Annotations as OA;

final readonly class Delete
{
    /**
     * @OA\Delete(
     *     path=HOUSE_DELETE_ROUTE,
     *     summary="Удалить один объект по ID",
     *     tags={"houses"},
     *     x={"order": 5},
     *
     *     @OA\Parameter(
     *          name="house_id",
     *          in="path",
     *          description="Уникальный числовой ID конкретного объекта",
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
