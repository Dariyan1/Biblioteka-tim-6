<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zanrovi extends Model
{
    use HasFactory;
    public function knjigas(){
        $this->belongsToMany(Knjiga::class);
    }
}
