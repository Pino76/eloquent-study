<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model
{
    use HasFactory;

    #Assegnazione Massiva
    protected $fillable = ['user_id','first_name','last_name','qualification'];

    public function phoneNumber(): HasOne
    {
           return $this->hasOne(PhoneNumber::class);
    }


    public function phoneNumbers(): HasMany
    {
        return $this->hasMany(PhoneNumber::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

}
