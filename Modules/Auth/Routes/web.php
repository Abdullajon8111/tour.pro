<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\RegisterController;

Route::prefix('auth')->group(function () {

    Route::view('register/agent', 'auth::register.agent')->name('register.agent');
    Route::view('register/tourist', 'auth::register.tourist')->name('register.tourist');

    Route::post('register/tourist', [RegisterController::class, 'tourist'])->name('register.tourist.post');

    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});
