<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function visimisis()
    {
        return $this->hasMany(VisiMisi::class);
    }
    public function dosens()
    {
        return $this->hasMany(Dosen::class);
    }
    public function kurikulums()
    {
        return $this->hasMany(Kurikulum::class);
    }
}
