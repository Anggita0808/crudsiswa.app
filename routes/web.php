<?php

use IIIuminate\http\request;
use Illuminate\Support\Facades\Route;
use App\http\controllers\SiswaController;

Route::get('/', [SiswaController::class,'index']);

Route::get('/siswa/create', [SiswaController::class,'create']);

Route::post('/siswa/store', [SiswaController::class,'store']);

Route::get('/siswa/delete/{id}', [SiswaController::class,'destroy']);

Route::get('/siswa/show/{id}', [SiswaController::class,'show']);


