<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('home', '/');
Route::redirect('admin/logout', '/');

Route::get('language/{locale}', function ($locale) {

    if (in_array($locale, config('app.locales'))) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
    }

    return redirect()->back();
});
