<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function izdavanja(){
        return $this->hasMany(Izdavanje::class,'knjiga_id');

    }

 /*   public function aktivna_izdavanja(){
        $this->izdavanja()
            ->where('')*/

 
            public function aktivna_izdavanja($b){
                /*
                $a=DB::table('statusknjiges')
                  ->where('Naziv', $b)
                  ->join('izdavanjestatusknjiges', 'izdavanjestatusknjiges.id','=','statusknjige_id')
                  ->join('izdavanjes', 'izdavanjes.id','=','izdavanje_id')
                  ->join('knjiges','knjiges.id','=','knjiga_id')
                  ->select('knjiges.*')
                  ->all();
                  return $a;
                */

                  $a=DB::table('knjigas')
                  ->join('izdavanjes', 'knjigas.id','=','knjiga_id')
                  ->join('izdavanjestatusknjiges', 'izdavanje_id','=','izdavanjes.id')
                  ->join('statusknjiges','statusknjiges.id','=','statusknjige_id')
                  ->where('Naziv', $b)
                  ->select('knjigas.*')
                  ->get()
                  ;
                  return $a;
          
          
          
          
                  }



    
   
}
