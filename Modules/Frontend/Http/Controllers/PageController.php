<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Tour;
use App\Models\User;
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
        $tours = Tour::search()->topOrder()->paginate(10);
        $tags = Tag::withCount('tours')->orderBy('tours_count')->take(8)->get();

        $sliderTours = Tour::topOrder()->take(4)->get();

        return view('frontend::index', compact('tours', 'countries', 'regions', 'tags', 'sliderTours'));
    }

    public function show(Tour $tour)
    {
        $check = (!isset($tour->user->tourAgent)) ||
            (
                $tour->status == Tour::STATUS_UNDER_REVIEW and
                !auth()->user()->hasRole(Role::ADMIN)
            );

        abort_if($check, 404);

        $agent = $tour->user->tourAgent;
        $tour->load('tags');

        return view('frontend::tour.show', compact('tour', 'agent'));
    }

    public function user_tours(User $user)
    {
        $countries = Country::getCountries();
        $regions = Region::all();
        $tours = Tour::search()->topOrder()->where('user_id', $user->id)->paginate(10);
        $tags = Tag::withCount('tours')->orderBy('tours_count')->take(8)->get();

        return view('frontend::index', compact('tours', 'countries', 'regions', 'tags'));
    }

    public function favorites()

    {
        $countries = Country::getCountries();
        $regions = Region::all();
        $tours = Tour::search()->topOrder()->whereHas('favorites', function (Builder $query) {
            $query->where('user_id', auth()->id());
        })->paginate(10);

        $tags = Tag::withCount('tours')->orderBy('tours_count')->take(8)->get();

        return view('frontend::index', compact('tours', 'countries', 'regions', 'tags'));
    }
}
