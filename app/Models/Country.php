<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Monarobase\CountryList\CountryListFacade;

class Country extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasTranslations;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $translatable = ['name'];

    public static function getCountries($locale = null)
    {
        if (!in_array($locale, config('app.locales'))) {
            $locale = app()->getLocale();
        }

        return CountryListFacade::getList($locale);
    }
}
