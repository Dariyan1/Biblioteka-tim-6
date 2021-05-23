<?php

namespace App\Http\Controllers;

use App\Models\Korisnici;
use Illuminate\Http\Request;

class KorisniciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $korisnici= Korisnici::all()->where('tipkorisnika_id', '2');
        return view('bibliotekari.index' ,compact('korisnici'));
    }
    public function create(){
        return view('bibliotekari.create');
    }
    public function store(Request $request){
        $korisnici = new Korisnici();
        $korisnici->imePrezime = $request->input('imePrezime');
        $korisnici->JMBG = $request->input('JMBG');
        $korisnici->tipkorisnika_id=$request->input('tipkorisnika_id');
        $korisnici->email = $request->input('email');
        $korisnici->korisnickoIme = $request->input('korisnickoIme');
        $korisnici->sifra=$request->input('sifra');
        $korisnici->ikonica=$request->input('ikonica');
        $korisnici->save();
        return redirect('/bibliotekari');
        
        
            
    }
    public function edit($id){
        $korisnici = Korisnici::find($id);
        return view('bibliotekari.edit', compact('korisnici'));
   
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $korisnici = Korisnici::find($id);
        $korisnici->imePrezime = $input['imePrezime'];
        $korisnici->tipkorisnika_id=$input['tipkorisnika_id'];
        $korisnici->JMBG = $input['JMBG'];
        $korisnici->email = $input['email'];
        $korisnici->korisnickoIme = $input['korisnickoIme'];
        $korisnici->sifra = $input['sifra'];
        $korisnici->ikonica = $input['ikonica'];
        $korisnici->save();
        return redirect('/bibliotekari');


    }

    
        public function delete($id){
            $korisnici = Korisnici::find($id)->delete();
        
            return redirect('/bibliotekari');
    }

    public function descb($id) {
        $korisnici = Korisnici::find($id);
        return view('bibliotekari.desc', compact('korisnici'));
    }

public function indexu(){
    $korisnici= Korisnici::all()->where('tipkorisnika_id', '1');
        return view('ucenici.index' ,compact('korisnici'));
    
     }

public function createu(){
    return view('ucenici.create');
}
public function storeu(Request $request){
    $korisnici = new Korisnici();
    $korisnici->imePrezime = $request->input('imePrezime');
    $korisnici->JMBG = $request->input('JMBG');
    $korisnici->tipkorisnika_id=$request->input('tipkorisnika_id');
    $korisnici->email = $request->input('email');
    $korisnici->korisnickoIme = $request->input('korisnickoIme');
    $korisnici->sifra=$request->input('sifra');
    $korisnici->ikonica=$request->input('ikonica');
    $korisnici->save();
    return redirect('/ucenici');
    
    
        
}
public function editu($id){
    $korisnici = Korisnici::find($id);
    return view('ucenici.edit', compact('korisnici'));

}

public function updateu($id, Request $request){
    $input = $request->all(); 
    $korisnici = Korisnici::find($id);
    $korisnici->imePrezime = $input['imePrezime'];
    $korisnici->tipkorisnika_id=$input['tipkorisnika_id'];
    $korisnici->JMBG = $input['JMBG'];
    $korisnici->email = $input['email'];
    $korisnici->korisnickoIme = $input['korisnickoIme'];
    $korisnici->sifra = $input['sifra'];
    $korisnici->ikonica = $input['ikonica'];
    $korisnici->save();
    return redirect('/ucenici');


}


    public function deleteu($id){
        $korisnici = Korisnici::find($id)->delete();
    
        return redirect('/ucenici');
}

public function descu($id) {
    $korisnici = Korisnici::find($id);
    return view('ucenici.descu', compact('korisnici'));
}

}
