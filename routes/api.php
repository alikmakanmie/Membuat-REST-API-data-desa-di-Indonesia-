<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\data\VillagesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(VillagesController::class)->group(function () {
    Route::get('/villages', 'index');
    Route::get('/villages/show/{id}', 'show');
    Route::post('/villages', 'store');
    Route::post('/villages/update/{id}', 'update');
    Route::delete('/villages/{id}', 'destroy');
});
