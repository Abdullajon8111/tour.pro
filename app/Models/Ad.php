<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Goodoneuz\PayUz\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use CrudTrait;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['expired_at'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(AdType::class, 'add_type');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable')->latestOfMany();
    }

    public function isPayed(): bool
    {
        return $this->transaction()->exists() and $this->transaction->state == 2;
    }
}
