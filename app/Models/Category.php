<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['Name', 'Description'];
    public $timestamps = false;

    // Định nghĩa mối quan hệ với Watch
    public function watches()
    {
        return $this->hasMany(Watch::class, 'IDCategory');
    }
}
