<?php

namespace App\Models\Orders;

use App\Models\Addresses\Addresses;
use App\Models\Table\Table;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'address_id',
        'table_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Addresses::class, 'address_id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
}
