<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';
    protected $primaryKey = 'table_id';

    protected $fillable = [
        'qr_code',
        'is_occupied',
    ];
}
