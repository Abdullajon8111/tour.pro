<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use App\Models\Tour;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Monarobase\CountryList\CountryListFacade;

class PageController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->paginate(10);
        $countries = Country::getCountries();
        $regions = Region::all();

        return view('frontend::index', compact('tours', 'countries', 'regions'));
    }

    public function show(Tour $tour)
    {
        return view('frontend::tour.show', compact('tour'));
    }
}
