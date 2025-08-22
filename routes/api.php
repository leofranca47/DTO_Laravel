<?php

use App\Http\Controllers\CriaClienteController;
use App\Http\Controllers\UserJsonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/userJson', [UserJsonController::class, 'store']);

Route::post('/cliente', CriaClienteController::class);
