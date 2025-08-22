<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Methods;

use OpenApi\Annotations as OA;

final readonly class FormCreate
{
    /**
     * @OA\Get(
     *     path=ROOM_FORM_CREATE_ROUTE,
     *     summary="Получить форму создания",
     *     tags={"rooms"},
     *     x={"order": 6},
     *
     *        @OA\Parameter(
     *            name="house_id",
     *            in="path",
     *            description="Уникальный числовой ID Дома",
     *            required=true,
     *            @OA\Schema(type="integer"),
     *            @OA\Examples(
     *                example="1",
     *                value="1",
     *                summary="1"
     *            )
     *        ),
     *
     *     @OA\Response(
     *         response="200",
     *         description="Форма успешно получена",
     *         @OA\JsonContent(ref="#/components/schemas/FormResponse")
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
