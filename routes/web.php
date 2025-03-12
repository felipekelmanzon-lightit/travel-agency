<?php

use Illuminate\Support\Facades\Route;
use Lightit\Shared\App\Exceptions\InvalidActionException;
use Lightit\Backoffice\Cities\App\Controllers\ListCitiesController;
use Lightit\Backoffice\Cities\App\Controllers\StoreCityController;
use Lightit\Backoffice\Cities\App\Controllers\UpdateCityController;
use Lightit\Backoffice\Cities\App\Controllers\DeleteCityController;
use Lightit\Backoffice\Airlines\App\Controllers\ListAirlinesController;
use Lightit\Backoffice\Airlines\App\Controllers\StoreAirlineController;
use Lightit\Backoffice\Airlines\App\Controllers\UpdateAirlineController;
use Lightit\Backoffice\Airlines\App\Controllers\DeleteAirlineController;

Route::prefix('cities')
    ->group(static function () {
        Route::get('/', ListCitiesController::class);
        Route::post('/', StoreCityController::class);
        Route::put('/{city}', UpdateCityController::class);
        Route::delete('/{city}', DeleteCityController::class);
    });

Route::prefix('airlines')
    ->group(static function () {
        Route::get('/', ListAirlinesController::class);
        Route::post('/', StoreAirlineController::class);
        Route::put('/{airline}', UpdateAirlineController::class);
        Route::delete('/{airline}', DeleteAirlineController::class);
    });


Route::get('invalid', static fn() => throw new InvalidActionException("Is not valid"));

Route::get('{unknown}', static fn () => view('app  '))->where('unknown', '^(?!api).*$');

