<?php

namespace Modules\Auth\Http\Controllers;

use Alert;
use App\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Routing\Controller;
use Log;
use Modules\Auth\Http\Requests\TouragentRegistrationRequest;
use Modules\Auth\Http\Requests\TouristRegistrationRequest;
use Throwable;

class RegisterController extends Controller
{
    /**
     * @throws Throwable
     */
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
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('Register tourist error:', $e->getTrace());
            return redirect()->route('frontend.page.index');
        }

        Alert::success(__('Регистрация прошла успешно!'))->flash();

        return redirect()->route('frontend.page.index');
    }

    /**
     * @throws Throwable
     */
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
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('Register tour agent error:', $e->getTrace());
        }

        Alert::success(__('Регистрация прошла успешно!'))->flash();
        return redirect()->route('backpack.dashboard');
    }
}
