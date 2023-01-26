<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend::index');
    }

    public function show()
    {
        return view('frontend::tour.show');
    }
}
