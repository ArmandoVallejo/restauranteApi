<?php

namespace App\Models\Dishes;

use App\Models\Carts\Cart;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $primaryKey = 'dish_id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'ingredients',
        'dish_image',
        'preparation_time',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_dishes', 'dish_id', 'cart_id');
    }
}
