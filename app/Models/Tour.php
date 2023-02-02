<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use CrudTrait;
    use SoftDeletes;
    use HasTranslations;
    use Sluggable;

    const TIME_TYPE_ONE_TIME = 0;
    const TIME_TYPE_SEASONAL = 1;

    protected $guarded = ['id'];
    protected $translatable = [
        'name', 'duration', 'age_limit', 'about',
        'program', 'hotels', 'price_description',
        'description', 'sub_title', 'title'
    ];

    protected $casts = [
        'images' => 'array',
        'program' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function time_types(): array
    {
        return [
            self::TIME_TYPE_ONE_TIME => __('Один раз'),
            self::TIME_TYPE_SEASONAL => __('Сезонный')
        ];
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function setBannerImageAttribute($value)
    {
        $attribute_name = "banner_image";
        $disk = "uploads";
        $destination_path = "tour/banner-images";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setImagesAttribute($value)
    {
        $attribute_name = "images";
        $disk = "uploads";
        $destination_path = "tour/gallery-images";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
