<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailWatch extends Model
{
    use HasFactory;

    protected $fillable = ['IDWatch', 'IDMaterialStrap', 'IDColor', 'Price', 'Image', 'Quantity'];

    public $timestamps = false;

    public function watch()
    {
        return $this->belongsTo(Watch::class, 'IDWatch');
    }

    public function materialStrap()
    {
        return $this->belongsTo(MaterialStrap::class, 'IDMaterialStrap');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'IDColor');
    }
}
