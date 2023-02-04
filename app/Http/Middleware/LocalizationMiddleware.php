<?php

namespace App\Http\Middleware;

use App;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $carbon_locales = [
            'ru' => 'ru',
            'uz' => 'uz'
        ];

        if (Session::has('locale')) {
            App::setLocale($locale = Session::get('locale'));

            Carbon::setLocale($carbon_locales[$locale] ?? 'ru');
        }

        return $next($request);
    }
}
