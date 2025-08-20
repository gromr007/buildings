<?php

namespace App\Data\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class JsonCast implements Cast
{
    /**
     * @param DataProperty $property
     * @param mixed $value
     * @param array $properties
     * @param CreationContext $context
     * @return array
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): array
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded;
            }
            return [];
        }

        return is_array($value) ? $value : [];
    }
}
