<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Frontend\Http\Requests\AppealStoreRequest;
use Prologue\Alerts\Facades\Alert;

class AppealController extends Controller
{
    public function store(AppealStoreRequest $request)
    {
        $appeal = Appeal::create($request->validated());
        $appeal->status = Appeal::STATUS_NEW;
        $appeal->user_id = auth()->id();
        $appeal->save();

        Alert::success(__('Вы успешно подали заявку'))->flash();

        return back();
    }
}
