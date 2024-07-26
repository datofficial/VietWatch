<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';

    protected $fillable = [
        'Description',
        'AmountOfWatch',
        'IDOrder',
        'IDDetailWatch'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'IDOrder');
    }

    public function watch()
    {
        return $this->belongsTo(Watch::class, 'IDDetailWatch');
    }
}
