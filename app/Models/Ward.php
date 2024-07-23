<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = ['district_id', 'NameWard'];

    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
