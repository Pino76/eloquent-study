<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }


    public function branch(): HasOneThrough
    {
        return $this->hasOneThrough(Branch::class, Company::class);
    }


    public function phoneNumbers(): HasManyThrough
    {
        return $this->hasManyThrough(PhoneNumber::class, Contact::class);
    }


    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class)->withTimestamps();
    }


    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class); # Uno user ha molti preferiti
    }

}
