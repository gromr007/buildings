<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\Examples;

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
                "id": 12,
                "floors": 2,
                "roof": "Желтая",
                "address": "Красноармейская 22 кв 3",
                "garage": true,
                "created": "2025-08-21 09:52:03",
                "updated": null,
                "wall": {
                    "id": 3,
                    "name": "дерево"
                },
                "services": [
                    {
                        "id": 1,
                        "name": "газ"
                    },
                    {
                        "id": 2,
                        "name": "вода"
                    },
                    {
                        "id": 4,
                        "name": "электричество"
                    }
                ],
                "rooms": [
                    {
                        "id": 1,
                        "name": "Спальня",
                        "electr_points": 35,
                        "ceiling": true,
                        "created": null,
                        "updated": null,
                        "floor": {
                            "id": 1,
                            "name": "ламинат"
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
                ]
            }
        }';

        return json_decode(json: $json, associative: true);

    }
}
