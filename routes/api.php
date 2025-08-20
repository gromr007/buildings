<?php

use Illuminate\Support\Facades\Route;

Route::group(
    attributes: [
        'as' => 'api.',
        'prefix' => '',
        'middleware' => [
            'api',
        ],
    ],
    routes: function () {

        Route::group(
            attributes: [
                'as' => 'houses.',
                'prefix' => '/houses',
                'middleware' => [],
            ],
            routes: [
                base_path(path: '/routes/api/houses/houses.php'),
            ]
        );
    }
);
