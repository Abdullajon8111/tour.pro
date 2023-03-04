<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdType;
use App\Models\Tour;
use Str;

class AdsController extends Controller
{
    public function index(Tour $tour)
    {
        $types = AdType::all();

        return view('ad.index', compact('tour', 'types'));
    }

    public function pay(Tour $tour, $type)
    {
        $type = AdType::find($type);

        $ad = new Ad();
        $ad->add_type = $type->id;
        $ad->tour_id = $tour->id;
        $ad->user_id = auth()->id();
        $ad->amount = $type->amount;
        $ad->expired_at = now()->addDays($type->lifetime);
        $ad->uuid = Str::uuid();
        $ad->save();

        $m = '63f5c2d8725dd9cc4831f667';
        $ac = strval($ad->id);
        $a = strval($ad->amount);
        $c = route('ads.callback', [
            'tour' => $tour->id,
            'uuid' => $ad->uuid
        ]);

        $base64 = base64_encode("m={$m};ac.key={$ac};a={$a};c={$c}");
        $url = "https://checkout.paycom.uz/{$base64}";

        return redirect()->to($url);
    }

    public function callback(Tour $tour, $uuid)
    {
        $ad = Ad::whereTourId($tour->id)->whereUuid($uuid)->firstOrFail();
        $ad->status = 2;
        $ad->save();

        $tour->top_expired_at = $ad->expired_at;
        $tour->save();

        return redirect()->route('ads.thank-you', $ad->id);
    }

    public function thankYou(Ad $ad)
    {
        return view('ad.thank-you');
    }
}
