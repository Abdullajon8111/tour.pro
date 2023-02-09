<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Favorite;
use App\Models\Tour;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Frontend\Http\Requests\ElectedRequest;
use function Symfony\Component\Translation\t;

class TourController extends Controller
{
    public function favorite(Tour $tour)
    {
        if (!auth()->check()) {
            return false;
        }

        Favorite::toggle(auth()->id(), $tour->id);

        return true;
    }
}
