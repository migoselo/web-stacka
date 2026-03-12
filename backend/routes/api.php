<?php

use Illuminate\Support\Facades\Route;

Route::get('/buku', function () {
    return response()->json([
        ["judul"=>"Algoritma"],
        ["judul"=>"Struktur Data"]
    ]);
});