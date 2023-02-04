<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Tour extends Model
{
    use CrudTrait;
    use SoftDeletes;
    use HasTranslations;
    use Sluggable;
    use HasSEO;

    const TIME_TYPE_ONE_TIME = 0;
    const TIME_TYPE_SEASONAL = 1;
    protected $guarded = ['id'];
    protected $translatable = [
        'name', 'duration', 'age_limit', 'about',
        'program', 'hotels', 'price_description',
        'description', 'sub_title', 'title', 'visa'
    ];
    protected $casts = [
        'images' => 'array',
        'program' => 'array'
    ];
    protected $dates = ['start_time', 'end_time'];

    public static function time_types(): array
    {
        return [
            self::TIME_TYPE_ONE_TIME => __('Один раз'),
            self::TIME_TYPE_SEASONAL => __('Сезонный')
        ];
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            $this->title,
            $this->sub_title,
            $this->user->name,
            asset("storage/{$this->banner_image}")
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tour_tag');
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
