<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'index']);
Route::post('/tambah', [WebController::class, 'simpan']);
Route::delete('/hapus/{id}', [WebController::class, 'hapus']);
Route::get('/edit/{id}', [WebController::class, 'edit']);
Route::put('/update/{id}', [WebController::class, 'update']);