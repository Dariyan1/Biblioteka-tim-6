<?php

namespace App\Http\Controllers;

use App\Models\Ucenici;
use Illuminate\Http\Request;

class UceniciController extends Controller
{
    public function index(){
        $ucenici= Ucenici::all(); 
        return view('ucenici.index', ['ucenici'=>$ucenici]);
    }
    public function create(){
        return view('ucenici.create');
    }
    public function store(Request $request){
        $ucenici = new Ucenici();
        $ucenici->imePrezime = $request->input('imePrezime');
        $ucenici->JMBG = $request->input('JMBG');
        $ucenici->email = $request->input('email');
        $ucenici->korisnickoIme = $request->input('korisnickoIme');
        $ucenici->sifra=$request->input('sifra');
        $ucenici->ikonica=$request->input('ikonica');
        $ucenici->save();
        return redirect('/ucenici');
        
        
            
    }
    public function edit($id){
        $ucenici = Ucenici::find($id);
        return view('ucenici.edit', compact('ucenici'));
   
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $ucenici = Ucenici::find($id);
        $ucenici->imePrezime = $input['imePrezime'];
        $ucenici->JMBG = $input['JMBG'];
        $ucenici->email = $input['email'];
        $ucenici->korisnickoIme = $input['korisnickoIme'];
        $ucenici->sifra = $input['sifra'];
        $ucenici->ikonica = $input['ikonica'];
        $ucenici->save();
        return redirect('/ucenici');


    }

    
        public function delete($id){
            $ucenici = Ucenici::find($id)->delete();
        
            return redirect('/ucenici');
    }

    public function descu($id) {
        $ucenici = Ucenici::find($id);
        return view('ucenici.descu', compact('ucenici'));
    }
}