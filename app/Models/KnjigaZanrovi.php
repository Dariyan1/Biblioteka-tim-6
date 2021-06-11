<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnjigaZanrovi extends Model
{
    use HasFactory;
    public function knjigas(){
        return $this->belongsToMany(Knjiga::class);
    }
}
