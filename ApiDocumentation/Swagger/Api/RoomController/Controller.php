<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController;

use OpenApi\Annotations as OA;

use ApiDocumentation\Swagger\Api\RoomController\Examples\Created;
use ApiDocumentation\Swagger\Api\RoomController\Examples\Updated;

define(
    'ROOM_CREATED',
    (new Created())->result()
);

define(
    'ROOM_UPDATED',
    (new Updated())->result()
);

/**
 * @OA\Tag(
 *     name="Rooms",
 *     description="Общие методы",
 *     x={"order": 1}
 * ),
 *
 *
 */
class Controller
{

}
