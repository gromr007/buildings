<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\Examples;

final readonly class Created
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
                "services": [],
                "rooms": []
            }
        }';

        return json_decode(json: $json, associative: true);

    }
}
