<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;


Route::get('/tables', [TableController::class, 'index']);
Route::get('/table', [TableController::class, 'show']);
Route::post('/table', [TableController::class, 'store']);
