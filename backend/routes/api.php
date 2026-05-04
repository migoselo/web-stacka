<?php

use App\Http\Controllers\DemoMemoController;
use Illuminate\Support\Facades\Route;

Route::get('/demo-memos', [DemoMemoController::class, 'index']);
Route::post('/demo-memos', [DemoMemoController::class, 'store']);
Route::delete('/demo-memos/{id}', [DemoMemoController::class, 'destroy']);
Route::post('/demo-memos', [DemoMemoController::class, 'store'])
    ->middleware('throttle:10,1');
