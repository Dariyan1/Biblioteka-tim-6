<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    const UCENIK=2;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded=[];
    
    public function tipkorisnika(){
        return $this->belongsTo(Tipkorisnika::class);
    }

    public function korisniklogin(){
        return $this->hasMany(Korisniklogin::class);
    }
    
    public static function ucenici(){
       return self::query()
              ->where('tipkorisnika_id','=',self::UCENIK)
              ->get();
        
    }

    public function izdaoKnjigu(){
        return $this->hasManyThrough(Knjiga::class,Izdavanje::class,'izdavanjes','izdaokorisnik_id','knjiga_id');
    }
    public function pozajmioKnjigu(){
        return $this->hasManyThrough(UKnjiga::class,Izdavanje::class,'izdavanjes','pozajmiokorisnik_id','knjiga_id');
    }

    public function setPasswordAttribute($password) {
       $this->attributes['password']=bcrypt($password);
    }
    
}
    