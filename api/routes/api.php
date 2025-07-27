<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::get('/health', [ApiController::class, 'health']);
Route::get('/externas', [ApiController::class, 'externas']);
