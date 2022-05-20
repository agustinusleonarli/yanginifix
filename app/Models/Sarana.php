<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    
    public function getImageAttribute($image)
    {
        return asset('storage/sarana/' . $image);
    }
}
