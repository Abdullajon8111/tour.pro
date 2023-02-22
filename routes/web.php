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
})->name('language.locale');

//handle requests from payment system
Route::any('/callback/{pay_type}',function($pay_type){
    return response()->json((new Goodoneuz\PayUz\PayUz)->driver($pay_type)->handle());
});

//redirect to payment system or payment form
Route::any('/pay/{pay_type}/{key}/{amount}',function($pay_type, $key, $amount){
    $model = Goodoneuz\PayUz\Services\PaymentService::convertKeyToModel($key);
    $url = request('redirect_url','/'); // redirect url after payment completed
    $pay_uz = new Goodoneuz\PayUz\PayUz;
    $pay_uz
        ->driver($pay_type)
        ->redirect($model, $amount, 860, $url);
});
