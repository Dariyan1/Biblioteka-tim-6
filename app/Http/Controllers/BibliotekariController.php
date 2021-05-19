<?php

namespace App\Http\Controllers;

use App\Models\Bibliotekari;
use Illuminate\Http\Request;

class BibliotekariController extends Controller
{
    public function index(){
        $bibliotekari= Bibliotekari::all(); 
        return view('bibliotekari.index', ['bibliotekari'=>$bibliotekari]);
    }
    public function create(){
        return view('bibliotekari.create');
    }
    public function store(Request $request){
        $bibliotekari = new Bibliotekari();
        $bibliotekari->imePrezime = $request->input('imePrezime');
        $bibliotekari->JMBG = $request->input('JMBG');
        $bibliotekari->email = $request->input('email');
        $bibliotekari->korisnickoIme = $request->input('korisnickoIme');
        $bibliotekari->sifra=$request->input('sifra');
        $bibliotekari->ikonica=$request->input('ikonica');
        $bibliotekari->save();
        return redirect('/bibliotekari');
        
        
            
    }
    public function edit($id){
        $bibliotekari = Bibliotekari::find($id);
        return view('bibliotekari.edit', compact('bibliotekari'));
   
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $bibliotekari = Bibliotekari::find($id);
        $bibliotekari->imePrezime = $input['imePrezime'];
        $bibliotekari->JMBG = $input['JMBG'];
        $bibliotekari->email = $input['email'];
        $bibliotekari->korisnickoIme = $input['korisnickoIme'];
        $bibliotekari->sifra = $input['sifra'];
        $bibliotekari->ikonica = $input['ikonica'];
        $bibliotekari->save();
        return redirect('/bibliotekari');


    }

    
        public function delete($id){
            $bibliotekari = Bibliotekari::find($id)->delete();
        
            return redirect('/bibliotekari');
    }

    public function descb($id) {
        $bibliotekari = Bibliotekari::find($id);
        return view('bibliotekari.desc', compact('bibliotekari'));
    }
}
