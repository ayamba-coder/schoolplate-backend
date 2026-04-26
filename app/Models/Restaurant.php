<?php

namespace App\Models;

use App\Observers\KycUsersObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([KycUsersObserver::class])]
class Restaurant extends User
{
    protected $table = "restaurants";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();

    }
    protected $fillable = [
        'user_id',
        'location'
    ];
}
