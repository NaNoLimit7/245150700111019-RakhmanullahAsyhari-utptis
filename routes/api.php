<?php

use App\Http\Controllers\KatalogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/products', [KatalogController::class, 'store']);
Route::get('/products', [KatalogController::class, 'index']);
Route::get('/products/{id}', [KatalogController::class, 'show']);
Route::put('/products/{id}', [KatalogController::class, 'update']);
Route::patch('/products/{id}', [KatalogController::class, 'modify']);
Route::delete('/products/{id}', [KatalogController::class, 'destroy']);