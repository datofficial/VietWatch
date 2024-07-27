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

    protected $dates = ['created_at', 'updated_at'];

    public function detailOrders()
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

    // Thêm phương thức để lấy trạng thái bằng tiếng Việt
    public function getStatusInVietnameseAttribute()
    {
        switch ($this->Status) {
            case 'pending':
                return 'Đang xử lý';
            case 'processing':
                return 'Đang giao';
            case 'completed':
                return 'Hoàn thành';
            case 'cancelled':
                return 'Đã hủy';
            default:
                return 'Không xác định';
        }
    }

    // Thêm phương thức để lấy màu trạng thái
    public function getStatusColorAttribute()
    {
        switch ($this->Status) {
            case 'pending':
                return 'warning';
            case 'processing':
                return 'primary';
            case 'completed':
                return 'success';
            case 'cancelled':
                return 'danger';
            default:
                return 'secondary';
        }
    }

    public function orderDetails()
    {
        return $this->hasMany(DetailOrder::class, 'IDOrder');
    }
}
