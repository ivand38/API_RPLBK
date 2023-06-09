<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ValoController;
//posts
Route::apiResource('/valo', App\Http\Controllers\Api\ValoController::class);
Route::get('/valo/cari/{nama}',[ValoController::class,'search']);