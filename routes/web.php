<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\First;

Route::get('/', [First::class, 'home']);
Route::get('/about', [First::class, 'about']);
Route::get('/contact', [First::class, 'contact']);
Route::get('/createac', [First::class, 'createac']);

Route::get('/login', [First::class, 'login']);
Route::get('/logout', [First::class, 'logout']);

Route::get('/deposit', [First::class, 'deposit']);
Route::get('/withdraw', [First::class, 'withdraw']);
Route::get('/fundtransfer', [First::class, 'fundtransfer']);
Route::get('/pinchange', [First::class, 'pinchange']);
Route::get('/balanceinq', [First::class, 'balanceinq']);
Route::get('/acsummary', [First::class, 'acsummary']);