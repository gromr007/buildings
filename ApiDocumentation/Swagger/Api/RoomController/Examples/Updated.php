<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Examples;

final readonly class Updated
{
    /**
     * @return array
     */
    public function result(): array
    {
        $json = '{
            "success": true,
            "data": {
                "id": 11,
                "name": "Душевая",
                "electr_points": 2,
                "ceiling": true,
                "created": "2025-08-21 09:54:26",
                "updated": null,
                "floor": {
                    "id": 3,
                    "name": "линолеум"
                },
                "furnitures": [
                    {
                        "id": 1,
                        "name": "стул"
                    },
                    {
                        "id": 2,
                        "name": "стол"
                    }
                ]
            }
        }';

        return json_decode(json: $json, associative: true);

    }
}
