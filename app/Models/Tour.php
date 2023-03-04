<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    const STATUS_PUBLISHED = 1;
    const STATUS_UNDER_REVIEW = 0;

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
    protected $dates = ['start_time', 'end_time', 'top_expired_at'];

    public static function time_types(): array
    {
        return [
            self::TIME_TYPE_ONE_TIME => __('Один раз'),
            self::TIME_TYPE_SEASONAL => __('Сезонный')
        ];
    }

    public static function statuses()
    {
        return [
            self::STATUS_UNDER_REVIEW => __('На рассмотрении'),
            self::STATUS_PUBLISHED => __('Опубликовано')
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->status = self::STATUS_UNDER_REVIEW;
            $model->user_id = auth()->id();
        });
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            $this->title ?? '',
            $this->sub_title ?? '',
            $this->user->name ?? '',
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

    public function group(): BelongsTo
    {
        return $this->belongsTo(TourGroupType::class, 'group_type');
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

    public function hasFavorite(): bool
    {
        return auth()->check() and Favorite::whereTourId($this->id)->whereUserId(auth()->id())->exists();
    }

    public function scopeSearch(Builder $query)
    {
        return $query
            ->with('tags')
            ->with('group')
            ->has('user')
            ->where('status', Tour::STATUS_PUBLISHED)
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
            })
            ->when(request('tags'), function (Builder $query, $tags) {
                $query->whereHas('tags', function (Builder $q) use ($tags) {
                    $q->whereIn('slug', explode(',', $tags));
                });
            })
            ->when(request('tag'), function (Builder $query, $tag) {
                $query->whereHas('tags', function (Builder $q) use ($tag) {
                    $q->where('slug', $tag);
                });
            });
    }

    public function scopeTopOrder(Builder $query): Builder
    {
        return $query
            ->select([
                '*',
                DB::raw('if(COALESCE(top_expired_at, 0) < now(), 0, 1) as top')
            ])
            ->orderByDesc('top')
            ->orderByDesc('topped_at')
            ->orderByDesc('id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function lastAd(): HasOne
    {
        return $this->hasOne(Ad::class, 'tour_id')->latestOfMany();
    }

    public function isTop()
    {
        return $this->lastAd();
    }
}
