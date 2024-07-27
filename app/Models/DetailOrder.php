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

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class, 'IDOrder');
    }

    public function detailWatch()
    {
        return $this->belongsTo(DetailWatch::class, 'IDDetailWatch');
    }
}

