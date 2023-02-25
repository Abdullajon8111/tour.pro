<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourGroupType extends Model
{
    use CrudTrait;
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = ['id'];
    protected $translatable = ['name'];
}
