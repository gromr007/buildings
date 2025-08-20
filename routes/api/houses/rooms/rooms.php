<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Room\RoomController;

Route::group(
    attributes: [
        'as' => '',
        'prefix' => '',
        'middleware' => [],
    ],
    routes: function () {
        Route::controller(RoomController::class)->group(callback: function () {
            Route::get(uri: '/{room_id}/form/', action: 'getFormUpdate')->name(name: 'form.update');
            Route::get(uri: '/form', action: 'getFormStore')->name(name: 'form.store');

            Route::get(uri: '/', action: 'index')->name(name: 'index');
            Route::post(uri: '/', action: 'store')->name(name: 'store');

            Route::prefix('/{room_id}')->whereNumber('room_id')->group(callback: function () {
                Route::get(uri: '/', action: 'show')->name(name: 'show');
                Route::delete(uri: '/', action: 'destroy')->name(name: 'destroy');
                Route::put(uri: '/', action: 'update')->name(name: 'update');
            });
        });
    }
);
