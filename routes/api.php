<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;

Route::apiResource('divisions', DivisionController::class);
Route::get('divisions/{id}/subdivisions', [DivisionController::class, 'subdivisions']);
