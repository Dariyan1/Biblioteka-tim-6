<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;

    public function autor() {
        return $this->belongsToMany(Autor::class, 'autor_knjiga');
    }
    
}
