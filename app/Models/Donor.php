<?php

namespace App\Models;

use App\Models\Contracts\ShouldUseExtraFillables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Donor extends Model
{

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Relationship for Donors with Donation
     * @return HasOneOrMany<Donation, User>
     */
    public function donations(): HasOneOrMany
    {
        return $this->hasMany(Donation::class);
    }
    public function allocatedStudents(): HasOneOrMany
    {
        return $this->hasMany(Student::class);
    }

    protected $fillable = [
        'occupation',
    ];
}
