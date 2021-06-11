<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function izdavac(){
        return $this->belongsTo(Izdavac::class);
    }
    public function format(){
        return $this->belongsTo(Format::class);
    }
    public function pismo(){
        return $this->belongsTo(Pismo::class);
    }
    public function povez(){
        return $this->belongsTo(Povez::class);
    }
    public function jezik(){
        return $this->belongsTo(Jezik::class);
    }

    public function kategorijes(){
        return $this->belongsToMany(Kategorije::class);
    }

    public function autors(){
        return  $this->belongsToMany(Autor::class);
    }

    public function zanrovis(){
        return $this->belongsToMany(Zanrovi::class);
    }

    public function izdataOd(){
        return $this->hasManyThrough(User::class,Izdavanje::class,'knjiga_id','id','id','izdaokorisnik_id');
    }

    public function izdataZa(){
        return $this->hasManyThrough(User::class,Izdavanje::class,'knjiga_id','id','id','pozajmiokorisnik_id');
    }
   
}
