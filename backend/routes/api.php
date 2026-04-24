<?php

use App\Http\Controllers\DemoMemoController;

Route::get('/demo-memos', [DemoMemoController::class, 'index']);
Route::post('/demo-memos', [DemoMemoController::class, 'store']);
Route::delete('/demo-memos/{id}', [DemoMemoController::class, 'destroy']);
