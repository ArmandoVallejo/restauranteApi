<?php

namespace App\Models\User;

use App\Models\Addresses\Addresses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_image',
    ];

    protected $hidden = [
        'password',
    ];

    //relaciones
    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Addresses::class, 'user_addresses', 
        'user_id', 'address_id');
    }
}
