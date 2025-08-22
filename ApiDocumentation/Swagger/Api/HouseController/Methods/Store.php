<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\Methods;

use OpenApi\Annotations as OA;
final readonly class Store
{
    /**
     * @OA\Post(
     *     path=HOUSE_STORE_ROUTE,
     *     summary="Создать объект",
     *     tags={"houses"},
     *     x={"order": 3, "sort": 10},
     *
     *     @OA\RequestBody(
     *         description="Данные для создания",
     *         required=true,
     *         @OA\JsonContent(
     *             ref="#/components/schemas/HouseStoreRequest"
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
     *                  value=HOUSE_CREATED
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

