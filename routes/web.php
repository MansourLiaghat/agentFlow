<?php

use App\Http\Controllers\Api\ChatFlowController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::prefix('/chatflows')
    ->withoutMiddleware([VerifyCsrfToken::class])->group(function () {
        Route::POST('/', [ChatFlowController::class, 'store']);
        Route::GET('{id}', [ChatFlowController::class, 'show']);
        Route::GET('/apikey/{apikey}', [ChatFlowController::class, 'showByApikey']);
        Route::PUT('{id}', [ChatFlowController::class, 'update']);
        Route::DELETE('{id}', [ChatFlowController::class, 'destroy']);
        Route::GET('/', [ChatFlowController::class, 'index']);
    });
