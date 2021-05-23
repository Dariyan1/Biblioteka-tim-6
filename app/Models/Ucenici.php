<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ucenici extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function knjiga(){
        return $this->belongsTo(Knjige::class, 'knjiges');
    }
    public function korisnici(){
        return $this->belongsTo(Korisnici::class, 'korisnicis');
    }
}
