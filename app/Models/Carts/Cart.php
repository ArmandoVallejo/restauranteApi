<?php

namespace App\Models\Carts;

use App\Models\Dishes\Dish;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'cart_dishes', 'cart_id', 'dish_id')
            ->withPivot(['quantity', 'total_price'])
            ->withTimestamps();
    }
}
