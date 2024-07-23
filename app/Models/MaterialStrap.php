<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialStrap extends Model
{
    use HasFactory;

    protected $fillable = ['Name'];
    public $timestamps = false;
    // public function detailwatches()
    // {
    //     return $this->hasMany(DetailWatch::class, 'IDDetailWatch');
    // }
}
