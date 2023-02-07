<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use App\Models\Tour;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Monarobase\CountryList\CountryListFacade;

class PageController extends Controller
{
    public function index()
    {
        $countries = Country::getCountries();
        $regions = Region::all();

        $query = Tour::latest()
            ->whereStatus(Tour::STATUS_PUBLISHED)
            ->when(request('key'), function (Builder $query, $key) {
                $query->where(function (Builder $query) use ($key) {
                    $query->orWhereRelation('tags', 'name', 'like', "%{$key}%");

                    $query->orWhere('name', 'like', "%$key%");
                    $query->orWhere('description', 'like', "%$key%");
                    $query->orWhere('about', 'like', "%$key%");
                    $query->orWhere('title', 'like', "%$key%");
                    $query->orWhere('sub_title', 'like', "%$key%");
                });
            })
            ->when(request('region'), function (Builder $query, $region) {
                $query->where('region_id', $region);
            })
            ->when(request('country'), function (Builder $query, $country) {
                $query->where('country_code', $country);
            });

        $tours = $query->paginate(10);

        return view('frontend::index', compact('tours', 'countries', 'regions'));
    }

    public function show(Tour $tour)
    {
        return view('frontend::tour.show', compact('tour'));
    }
}
