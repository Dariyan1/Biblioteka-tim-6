<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\PismoController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\IzdavacController;
use App\Http\Controllers\AutorController;
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