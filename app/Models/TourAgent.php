<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image;
use Storage;
use Str;

class TourAgent extends Model
{
    use CrudTrait;
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = ['id'];
    protected $translatable = ['name', 'description'];

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($obj) {
            Storage::disk('public')->delete($obj->image);
        });
    }

    public function setPhotoAttribute($value)
    {
        $attribute_name = "photo";
        $disk = 'public';
        $destination_path = "tour-agent";

        if ($value == null) {
            Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (Str::startsWith($value, 'data:image')) {
            $image = Image::make($value)->encode('jpg', 90);
            $filename = md5($value . time()) . '.jpg';
            Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
            Storage::disk($disk)->delete($this->{$attribute_name});

            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;
        }
    }
}
