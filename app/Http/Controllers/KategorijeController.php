<?php

namespace App\Http\Controllers;

use App\Models\Kategorije;
use Illuminate\Http\Request;

class KategorijeController extends Controller
{
    public function index(){
        $kategorije= Kategorije::all(); 
        return view('kategorije.index', ['kategorije'=>$kategorije]);
    }
    public function create(){
        return view('kategorije.create');
    }
    public function store(Request $request){
        $kategorije = new Kategorije();
        $kategorije->naziv = $request->input('naziv');
        $kategorije->ikonica = $request->input('ikonica');
        $kategorije->opis = $request->input('opis');
        $kategorije->save();
        return redirect('/settingsKategorije');
    }
    public function edit($id){
        $kategorije = Kategorije::find($id);
        return view('kategorije.edit', compact('kategorije'));
   
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $kategorije = Kategorije::find($id);
        $kategorije->naziv = $input['naziv'];
        $kategorije->ikonica = $input['ikonica'];
        $kategorije->opis = $input['opis'];
        $kategorije->save();
        return redirect('/settingsKategorije');


    }

    
        public function delete($id){
            $kategorije = Kategorije::find($id)->delete();
        
            return redirect('/settingsKategorije');
    }

        
}
