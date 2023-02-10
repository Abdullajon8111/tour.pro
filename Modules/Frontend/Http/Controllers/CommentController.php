<?php

namespace Modules\Frontend\Http\Controllers;

use Alert;
use Illuminate\Routing\Controller;
use Modules\Frontend\Http\Requests\CommentStoreRequest;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
        auth()->user()->comments()->create($request->validated());
        Alert::success(__('Запись была успешно добавлена.'))->flash();

        return back();
    }
}
