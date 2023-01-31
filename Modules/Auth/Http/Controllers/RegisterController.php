<?php

namespace Modules\Auth\Http\Controllers;

use Alert;
use App\Models\User;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\TouristRegistrationRequest;

class RegisterController extends Controller
{
    public function tourist(TouristRegistrationRequest $request)
    {
        $user = User::create($request->validated());
        $user->tourist()->create($request->validated());

        auth()->login($user);
        Alert::success(__('Регистрация прошла успешно!'))->flash();

        return redirect()->route('frontend.page.index');
    }
}
