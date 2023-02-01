<?php

namespace Modules\Auth\Http\Controllers;

use App\Library\Auth\AuthenticatesUsers;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\AuthLoginRequest;

class AuthController extends Controller
{
    use AuthenticatesUsers {
        login as loginTrait;
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('frontend.page.index');
    }

    public function login(Request $request)
    {
        $parent = $this->loginTrait($request);

        if (auth()->user()->hasRole([Role::ADMIN, Role::AGENT])) {
            return redirect()->route('backpack.dashboard');
        }

        return redirect()->route('frontend.page.index');
    }

    public function username()
    {
        return 'login';
    }
}
