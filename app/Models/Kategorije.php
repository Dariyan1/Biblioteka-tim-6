<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorije extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function knjiga(){
        return $this->hasMany(Knjige::class, 'kategorija_knjiga');
    }
}
