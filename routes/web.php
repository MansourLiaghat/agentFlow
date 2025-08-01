<?php

use App\Http\Controllers\Api\ChatFlowController;
use App\Http\Controllers\Api\documentStoreController;
use App\Http\Controllers\Api\NodeController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::prefix('/chatflows')
    ->withoutMiddleware([VerifyCsrfToken::class])->group(function () {
        Route::POST('/', [ChatFlowController::class, 'store']);
        Route::GET('{chatFlowId}', [ChatFlowController::class, 'show']);
        Route::GET('/apikey/{apikey}', [ChatFlowController::class, 'showByApikey']);
        Route::PUT('{chatFlowId}', [ChatFlowController::class, 'update']);
        Route::DELETE('{chatFlowId}', [ChatFlowController::class, 'destroy']);
        Route::GET('/', [ChatFlowController::class, 'index']);
    });


Route::prefix('chatflows/nodes')
    ->withoutMiddleware([VerifyCsrfToken::class])->group(function () {
        Route::POST('/', [NodeController::class, 'store']);

    });

Route::prefix('chatflows/{chatFlowId}/nodes')
    ->withoutMiddleware([VerifyCsrfToken::class])->group(function () {
        Route::GET('{nodeId}', [NodeController::class, 'show']);
        Route::get('/', [NodeController::class, 'index']);
        Route::PUT('{nodeId}', [NodeController::class, 'update']);
        Route::DELETE('{nodeId}', [NodeController::class, 'destroy']);
    });


Route::prefix('/document-store/store/')
    ->withoutMiddleware([VerifyCsrfToken::class])->group(function () {
        Route::POST('/', [DocumentStoreController::class, 'store']);
        Route::GET('{id}', [DocumentStoreController::class, 'show']);
        Route::GET('/', [DocumentStoreController::class, 'index']);
        Route::PUT('{id}', [DocumentStoreController::class, 'update']);
        Route::DELETE('{id}', [DocumentStoreController::class, 'delete']);
    });
