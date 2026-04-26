<?php

namespace App\Models;

use App\Models\Contracts\ShouldUseExtraFillables;
use App\Models\Traits\MustVerifyAccount;
use App\Observers\KycUsersObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Notifications\Notifiable;

#[ObservedBy([KycUsersObserver::class])]
class Student extends Model
{
    use MustVerifyAccount, Notifiable;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function donors()
    {
        return $this->belongsToMany(Donor::class);
    }
    public function documents()
    {
        return $this->hasMany(StudentDocument::class);
    }

    /**
     * Relationship for Student recipients with Donation
     * @return HasOneOrMany<Donation, User>
     */
    public function recievedDonations(): HasOneOrMany
    {
        return $this->hasMany(Donation::class);
    }
    protected $fillable = [
        'user_id',
        'school_id',
        'department',
        'level',
        'matricule',
    ];
}
