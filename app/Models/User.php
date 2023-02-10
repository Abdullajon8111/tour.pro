<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;
    use HasRoles;
    use Sluggable;

    protected $fillable = [
        'name', 'email', 'password', 'login'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function tourist(): HasOne
    {
        return $this->hasOne(Tourist::class);
    }

    public function tourAgent(): HasOne
    {
        return $this->hasOne(TourAgent::class);
    }

    public function appeals(): HasMany
    {
        return $this->hasMany(Appeal::class);
    }

    public function tours(): BelongsToMany
    {
        return $this->belongsToMany(Tour::class, 'favorites');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
