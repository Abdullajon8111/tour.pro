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

use Modules\Frontend\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/tour', [PageController::class, 'show'])->name('page.show');
