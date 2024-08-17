<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '1.0'], function () {

    Route::group(['prefix' => 'users'], function () {
        Route::post("/login", [UserController::class, 'login']);

        Route::post("/register", [UserController::class, 'register']);

        Route::post('/update', [
            "uses" => "App\Http\Controllers\API\V1_0\UserController@update",
            'roles' => ['administrator']
        ])->middleware('auth:sanctum');

        Route::post("/update/password", [
            UserController::class, 'updatePassword'
        ])->middleware('auth:sanctum');
    });
});

