<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController;

use OpenApi\Annotations as OA;

use ApiDocumentation\Swagger\Api\HouseController\Examples\Created;
use ApiDocumentation\Swagger\Api\HouseController\Examples\Updated;

define(
    'HOUSE_CREATED',
    (new Created())->result()
);

define(
    'HOUSE_UPDATED',
    (new Updated())->result()
);

/**
 * @OA\Tag(
 *     name="Houses",
 *     description="Общие методы",
 *     x={"order": 1}
 * ),
 *
 *
 */
class Controller
{

}
