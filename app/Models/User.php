<?php

namespace App\Models;

use App\Models\Traits\HasUserBehaviour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\Contracts\HasApiTokens as HasApiTokensInterface;
use Laravel\Sanctum\HasApiTokens;


/**
 * Base class for actors
 * 
 */
class User extends Authenticatable implements HasApiTokensInterface
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;


    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }
    public function donor(): HasOne
    {
        return $this->hasOne(Donor::class);
    }
    public function restaurant(): HasOne
    {
        return $this->hasOne(Restaurant::class);
    }
    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'telephone',
        'balance',
        'password',
        'role'
    ];


    /**
     * The attributes that should be hidden for serialization.217362888986-96ilnn771i6p48sbboij7i5bpgb8kmc0.apps.googleusercontent.com
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'balance' => 'decimal:2'
        ];
    }
}
