<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name', 'Description', 'Engine', 'AvoidWater', 'SizeStrap', 'SizeGlass', 'MaterialGlass', 'IDManufacturer', 'IDCategory'
    ];

    public $timestamps = false;

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'IDManufacturer');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'IDCategory');
    }
    
    public function detailWatches()
    {
        return $this->hasMany(DetailWatch::class, 'IDWatch');
    }
}
