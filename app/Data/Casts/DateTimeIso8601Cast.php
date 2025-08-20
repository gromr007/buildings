<?php

namespace App\Data\Casts;

use Carbon\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

readonly class DateTimeIso8601Cast implements Cast
{
    public function __construct(
        private string $format = 'Y-m-d\TH:i:s.v'
    ) {
    }

    /**
     * @param DataProperty $property
     * @param mixed $value
     * @param array $properties
     * @param CreationContext $context
     * @return string|null
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): ?string
    {
        if ($value === null) {
            return null;
        }
        $date = Carbon::parse($value);
        return $date->format($this->format);
    }
}
