<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['city_id', 'NameDistrict'];

    public $timestamps = false;

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
