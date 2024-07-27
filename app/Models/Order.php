<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'NameCustomer',
        'PhoneCustomer',
        'Address',
        'IDCity',
        'IDDistrict',
        'IDWard',
        'IDPaymentMethod',
        'TotalPrice',
        'Status',
        'NumberTracking',
        'IDUser'
    ];

    public function orderDetails()
    {
        return $this->hasMany(DetailOrder::class, 'IDOrder');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'IDCity');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'IDDistrict');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'IDWard');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'IDPaymentMethod');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'IDUser');
    }
}
