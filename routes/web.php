<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\PismoController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\IzdavacController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ZanrController;
use App\Http\Controllers\KategorijeController;
use App\Http\Controllers\BibliotekariController;
use App\Http\Controllers\UceniciController;
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

Route::get('/', function () {
    return view('dashboard.index');
})->name("dashboard");

Route::get('/settings', function () {
    return view('settings.index');
})->name("settings");

Route::get('/settingsPovez', [PovezController::class,'index'])->name("povez");

Route::get('/createPovez', [PovezController::class,'create'])->name("povez.create");

Route::post('/storePovez',[PovezController::class,'store'] )->name("povez.store");

Route::get('/deletePovez/{id}', [PovezController::class,'delete'] )->name("povez.delete");

Route::get('/editPovez/{id}', [PovezController::class,'edit'])->name("povez.edit");

Route::post('/updatePovez/{id}', [PovezController::class,'update'])->name("povez.update");
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/settingsPismo', [PismoController::class,'index'])->name("pismo");

Route::get('/createPismo', [PismoController::class,'create'])->name("pismo.create");

Route::post('/storePismo',[PismoController::class,'store'] )->name("pismo.store");

Route::get('/deletePismo/{id}', [PismoController::class,'delete'] )->name("pismo.delete");

Route::get('/editPismo/{id}', [PismoController::class,'edit'])->name("pismo.edit");

Route::post('/updatePismo/{id}', [PismoController::class,'update'])->name("pismo.update");
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/settingsFormat', [FormatController::class,'index'])->name("format");

Route::get('/createFormat', [FormatController::class,'create'])->name("format.create");

Route::post('/storeFormat',[FormatController::class,'store'] )->name("format.store");

Route::get('/deleteFormat/{id}', [FormatController::class,'delete'] )->name("format.delete");

Route::get('/editFormat/{id}', [FormatController::class,'edit'])->name("format.edit");

Route::post('/updateFormat/{id}', [FormatController::class,'update'])->name("format.update");
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/settingsIzdavac', [IzdavacController::class,'index'])->name("izdavac");

Route::get('/createIzdavac', [IzdavacController::class,'create'])->name("izdavac.create");

Route::post('/storeIzdavac',[IzdavacController::class,'store'] )->name("izdavac.store");

Route::get('/deleteIzdavac/{id}', [IzdavacController::class,'delete'] )->name("izdavac.delete");

Route::get('/editIzdavac/{id}', [IzdavacController::class,'edit'])->name("izdavac.edit");

Route::post('/updateIzdavac/{id}', [IzdavacController::class,'update'])->name("izdavac.update");
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/autori', [AutorController::class,'index'])->name("autor");

Route::get('/noviAutori', [AutorController::class,'create'])->name("autor.create");

Route::post('/autori',[AutorController::class,'store'] )->name("autor.store");

Route::get('/deleteAutori/{id}', [AutorController::class,'delete'] )->name("autor.delete");

Route::get('/editAutori/{id}', [AutorController::class,'edit'])->name("autor.edit");

Route::post('/updateAutori/{id}', [AutorController::class,'update'])->name("autor.update");

Route::get('/desc/{id}', [AutorController::class,'desc'])->name("autor.desc");
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/settingsZanrovi', [ZanrController::class,'index'])->name("Zanr");

Route::get('/createZanrovi', [ZanrController::class,'create'])->name("Zanr.create");

Route::post('/storeZanrovi',[ZanrController::class,'store'] )->name("Zanr.store");

Route::get('/deleteZanrovi/{id}', [ZanrController::class,'delete'] )->name("Zanr.delete");

Route::get('/editZanrovi/{id}', [ZanrController::class,'edit'])->name("Zanr.edit");

Route::post('/updateZanrovi/{id}', [ZanrController::class,'update'])->name("Zanr.update");
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/settingsKategorije', [KategorijeController::class, 'index'])->name("Kategorije");

Route::get('/novaKategorija', [KategorijeController::class,'create'])->name("kategorija.create");

Route::post('/storeKategorije',[KategorijeController::class,'store'] )->name("kategorije.store");

Route::get('/deleteKategorije/{id}', [KategorijeController::class,'delete'] )->name("kategorije.delete");

Route::get('/editKategorije/{id}', [KategorijeController::class,'edit'])->name("kategorije.edit");

Route::post('/updateKategorije/{id}', [KategorijeController::class,'update'])->name("kategorije.update");
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/bibliotekari', [BibliotekariController::class,'index'])->name("bibliotekari");

Route::get('/noviBibliotekari', [BibliotekariController::class,'create'])->name("bibliotekar.create");

Route::post('/bibliotekari',[BibliotekariController::class,'store'] )->name("bibliotekar.store");

Route::get('/deletebiBibliotekari/{id}', [BibliotekariController::class,'delete'] )->name("bibliotekar.delete");

Route::get('/editBibliotekari/{id}', [BibliotekariController::class,'edit'])->name("bibliotekar.edit");

Route::post('/updateBibliotekari/{id}', [BibliotekariController::class,'update'])->name("bibliotekar.update");

Route::get('/descb/{id}', [BibliotekariController::class,'descb'])->name("bibliotekari.desc");
////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/ucenici', [UceniciController::class,'index'])->name("ucenici");

Route::get('/noviUcenici', [UceniciController::class,'create'])->name("ucenici.create");

Route::post('/ucenici',[UceniciController::class,'store'] )->name("ucenici.store");

Route::get('/deleteUcenici/{id}', [UceniciController::class,'delete'] )->name("ucenici.delete");

Route::get('/editUcenici/{id}', [UceniciController::class,'edit'])->name("ucenici.edit");

Route::post('/updateUcenici/{id}', [UceniciController::class,'update'])->name("ucenici.update");

Route::get('/descu/{id}', [UceniciController::class,'descu'])->name("ucenicii.desc");