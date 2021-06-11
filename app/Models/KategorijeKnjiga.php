<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategorijeKnjiga extends Model
{
    use HasFactory;
    public function knjigas(){
        return $this->belnogsToMany(Knjiga::class);
    }
}
