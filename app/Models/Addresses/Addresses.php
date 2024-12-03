<?php

namespace App\Models\Addresses;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Addresses extends Model
{
    protected $table = 'addresses';
    protected $primaryKey = 'address_id';

    protected $fillable = [
        'address',
        'latitude',
        'longitude',
    ];

    //relaciones
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_addresses',
        'address_id', 'user_id');
    }
}
