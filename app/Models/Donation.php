<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = [
        'donor_id',
        'student_id',
        'amount',
        'recurring',
        'payment_channel',
    ];

    public function donor():BelongsTo{
        return $this->belongsTo(User::class,"donor_id");
    }

    public function student():BelongsTo{
        return $this->belongsTo(User::class,"student_id");
    }
}
