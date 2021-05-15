<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index(){
        $autor= Autor::all(); 
        return view('autor.index', ['autor'=>$autor]);
    }
    public function create(){
        return view('autor.create');
    }
    public function store(Request $request){
        $autor = new Autor();
        $autor->imePrezime = $request->input('imePrezime');
        $autor->Biografija = $request->input('Biografija');
        $autor->save();
        return redirect('/autori');
    }
    public function edit($id){
        $autor = Autor::find($id);
        return view('autor.edit', compact('autor'));
   
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $autor = Autor::find($id);
        $autor->imePrezime = $input['imePrezime'];
        $autor->Biografija = $input['Biografija'];
        $autor->save();
        return redirect('/autori');


    }

    
        public function delete($id){
            $autor = Autor::find($id)->delete();
        
            return redirect('/autori');
    }

        public function desc($id) {
            $autor = Autor::find($id);
            return view('autor.desc', compact('autor'));
        }
}
