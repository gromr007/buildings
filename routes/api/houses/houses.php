<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\House\HouseController;

Route::group(
    attributes: [
        'as' => '',
        'prefix' => '',
        'middleware' => [],
    ],
    routes: function () {
        Route::controller(HouseController::class)->group(callback: function () {
            Route::get(uri: '/{house_id}/form/', action: 'getFormUpdate')->name(name: 'form.update');
            Route::get(uri: '/form', action: 'getFormStore')->name(name: 'form.store');

            Route::get(uri: '/', action: 'index')->name(name: 'index');
            Route::post(uri: '/', action: 'store')->name(name: 'store');

            Route::prefix('/{house_id}')->whereNumber('house_id')->group(callback: function () {
                Route::get(uri: '/', action: 'show')->name(name: 'show');
                Route::delete(uri: '/', action: 'destroy')->name(name: 'destroy');
                Route::put(uri: '/', action: 'update')->name(name: 'update');
            });
        });

        Route::group(
            attributes: [
                'as' => 'rooms.',
                'prefix' => '/{house_id}/rooms',
                'middleware' => [],
            ],
            routes: [
                base_path(path: '/routes/api/houses/rooms/rooms.php'),
            ]
        );
    }


);
