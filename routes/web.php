<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinyBankController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return 'Bienvenido a Tiny Bank API';
});
Route::post('/deposit', [TinyBankController::class, 'deposit']);
Route::post('/withdraw', [TinyBankController::class, 'withdraw']);
Route::get('/balance', [TinyBankController::class, 'viewBalance']);
Route::get('/history', [TinyBankController::class, 'showHistory']);

