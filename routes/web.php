<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
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

Route::prefix('auth')->group(function(){
    Route::get('/google/redirect', [AuthController::class, 'redirectGoogle']);
    Route::get('/google/callback', [AuthController::class, 'callback']);

    Route::get('/facebook/redirect', [AuthController::class, 'redirectFacebook']);
    Route::get('/facebook/callback', [AuthController::class, 'callback']);
});


Route::get('/', function () {
    return view('welcome');
});
