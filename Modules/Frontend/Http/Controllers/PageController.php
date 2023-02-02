<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Tour;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->paginate(10);

        return view('frontend::index', compact('tours'));
    }

    public function show(Tour $tour)
    {
        return view('frontend::tour.show', compact('tour'));
    }
}
