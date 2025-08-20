<?php

declare(strict_types=1);

namespace App\Enums\Params;

enum Properties
{
    public const House = [
        'floors',
        'roof',
        'address',
        'garage',
        'wall',
        'services',
    ];

    public const Room = [
        'name',
        'electr_points',
        'ceiling',
        'floor',
        'furnitures',
    ];

}
