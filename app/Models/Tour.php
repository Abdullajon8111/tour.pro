<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use CrudTrait;
    use SoftDeletes;
    use HasTranslations;

    const TIME_TYPE_ONE_TIME = 0;
    const TIME_TYPE_SEASONAL = 1;

    protected $guarded = ['id'];
    protected $translatable = [
        'name', 'duration', 'age_limit', 'about',
        'program', 'hotels', 'price_description'
    ];

    protected $casts = [
        'images' => 'array',
        'program' => 'array'
    ];

    public static function time_types(): array
    {
        return [
            self::TIME_TYPE_ONE_TIME => __('Один раз'),
            self::TIME_TYPE_SEASONAL => __('Сезонный')
        ];
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
