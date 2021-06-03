<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PismoController;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\IzdavacController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\BibliotekarController;
use App\Http\Controllers\TipkorisnikaController;
use App\Http\Controllers\UcenikController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\ZanrController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\PolisaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dodajemo middleware za odredjivanje vidljivosti ruta
/*Route::middleware(['auth'])->group(function(){
});*/
// kraj route za dashboard
// Route za dashboard
Route::get("/",function(){
    return view('dashboard.index');
})->name('dashboard');
//Auth::routes();
//Route za Polisa
Route::resource('polisa',PolisaController::class);
//Route za Pismo
Route::resource('pismo',PismoController::class);
//Route za Format
Route::resource('format',FormatController::class);
//Route za Povez
Route::resource('povez',PovezController::class);
//Route za Zanr
Route::resource('zanr',ZanrController::class);
//Route za Kategoriju
Route::resource('kategorija',KategorijaController::class);
// route za Izdavac
Route::resource('izdavac',IzdavacController::class);
//Route za Autor
Route::resource('autor',AutorController::class);
// Route za Bibliotekar
Route::resource('bibliotekar',BibliotekarController::class);
// Route za Ucenika
Route::resource('ucenik',UcenikController::class);

//Route za knjigu
Route::get('knjiga0',[KnjigaController::class,'create0']);
Route::resource('knjiga',KnjigaController::class);
Route::get('knjiga-{knjiga}/specifikacija',[KnjigaController::class,'spec'])->name('knjiga.spec');
Route::post('rezervisi/{knjiga}',[KnjigaController::class,'rezervisi'])->name('knjiga.rezervisi');
Route::get('rezervacija/{knjiga}',[KnjigaController::class,'rezervacija'])->name('knjiga.rezervacija');
Route::get('izdavanje/{knjiga}',[KnjigaController::class,'izdavanje'])->name('knjiga.izdavanje');
Route::post('izdaj/{knjiga}',[KnjigaController::class,'izdaj'])->name('knjiga.izdaj');
Route::get('iznajmljena/{knjiga}',[KnjigaController::class,'iznajmljena'])->name('knjiga.iznajmljena');
Route::get('vracanje/{knjiga}',[KnjigaController::class,'vracanje'])->name('knjiga.vracanje');
Route::post('vrati/{knjiga}',[KnjigaController::class,'vrati'])->name('knjiga.vrati');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

