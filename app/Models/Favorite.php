<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use CrudTrait;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    public static function toggle($user_id, $tour_id)
    {
        $model = self::query()->whereUserId($user_id)->whereTourId($tour_id)->first();

        if ($model) {
            $model->delete();
        } else {
            self::create(compact('user_id', 'tour_id'));
        }
    }
}
