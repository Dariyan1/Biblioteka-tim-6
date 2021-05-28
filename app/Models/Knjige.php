<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjige extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function autor(){
        return $this->hasMany(Autor::class, 'autor_knjiga');
    }
    public function zanr(){
        return $this->hasMany(Zanr::class, 'knjiga_zanr');
    }
    public function kategorija(){
        return $this->hasMany(Kategorije::class, 'kategorije_knjiga');
    }
public function jezik(){
    return $this->hasOne(Jezik::class, 'jeziks');
}
public function format(){
    return $this->hasOne(Format::class, 'formats');
}
public function povez(){
    return $this->hasOne(Povez::class, 'povezs');


}
public function pismo(){
    return $this->hasOne(Pismo::class, 'pismos');

}
public function izdavac(){
    return $this->hasOne(Izdavac::class, 'izdavacs');

}
}


