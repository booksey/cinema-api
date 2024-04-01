<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProjectionController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'films' => FilmController::class,
    'projections' => ProjectionController::class,
]);
