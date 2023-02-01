<?php

namespace Modules\Auth\Http\Controllers;

use Alert;
use App\Models\Role;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\TouragentRegistrationRequest;
use Modules\Auth\Http\Requests\TouristRegistrationRequest;

class RegisterController extends Controller
{
    public function tourist(TouristRegistrationRequest $request)
    {

        try {
            DB::beginTransaction();
            $user = User::create($request->validated());
            $user->password = bcrypt($user->password);
            $user->save();

            $user->tourist()->create($request->validated());
            auth()->login($user);
            DB::commit();
        } catch (\Throwable $e) {
            dd($e->getMessage());
            DB::rollBack();
        }

        Alert::success(__('Регистрация прошла успешно!'))->flash();

        return redirect()->route('frontend.page.index');
    }

    public function tourAgent(TouragentRegistrationRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create($request->validated());
            $user->password = bcrypt($user->password);
            $user->save();

            $user->assignRole(Role::AGENT);
            $user->tourAgent()->create($request->validated());
            auth()->login($user);
            DB::commit();
        } catch (\Throwable $e) {
            dd($e->getMessage());
            DB::rollBack();
        }

        Alert::success(__('Регистрация прошла успешно!'))->flash();
        return redirect()->route('frontend.page.index');
    }
}
