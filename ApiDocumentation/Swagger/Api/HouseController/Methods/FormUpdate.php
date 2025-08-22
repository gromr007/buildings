<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\Methods;

use OpenApi\Annotations as OA;

final readonly class FormUpdate
{
    /**
     * @OA\Get(
     *     path=HOUSE_FORM_UPDATE_ROUTE,
     *     summary="Получить форму редактирования объекта",
     *     tags={"houses"},
     *     x={"order": 7},
     *
     *      @OA\Parameter(
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
     *
     *     @OA\Response(
     *         response="200",
     *         description="Форма успешно получена",
     *         @OA\JsonContent(ref="#/components/schemas/FormResponse")
     *     ),
     *
     *
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
