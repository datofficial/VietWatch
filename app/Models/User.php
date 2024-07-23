<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
class User extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;
    protected $fillable = [
        'NameUser', 'Password', 'PhoneNumber', 'Email', 'Role', 'IDCity', 'IDDistrict', 'IDWard', 'Address'
    ];

    protected $table = 'users';
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
}
