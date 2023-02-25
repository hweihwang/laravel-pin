<?php

use App\Modules\PIN\Transports\Handlers\Inertia\PINHandler;
use Illuminate\Support\Facades\Route;

Route::get('/favicon.ico', static function () {
    return response()->noContent();
});

Route::get('/', [PINHandler::class, 'init']);

Route::post('/verify', [PINHandler::class, 'verify']);
