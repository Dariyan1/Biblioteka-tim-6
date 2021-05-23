<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korisnici extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function tip(){
        return $this->hasMany(Ucenici::class, 'tip_korisnika');}
        public function tip2(){
            return $this->hasMany(Bibliotekari::class, 'tip_korisnika');}

       
}
