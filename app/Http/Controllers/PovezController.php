<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Povez;

class PovezController extends Controller
{
    public function index(){
        $povezi= Povez::all(); 
        return view('povez.index', ['povezi'=>$povezi]);
    }
    public function create(){
        return view('povez.create');
    }
    public function store(Request $request){
        $povez = new Povez();
        $povez->naziv = $request->input('naziv');
        $povez->save();
        return redirect('/settingsPovez');
    }
    public function edit($id){
        $povez = Povez::find($id);
        return view('povez.edit', compact('povez'));
    /*
    $povez =Povez::all();
    foreach($povez as $p) {
        if($p->id==$id) {
            $p->update();
            return redirect('/settingsPovez');

        }
        */
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $povez = Povez::find($id);
        $povez->naziv = $input['naziv'];
        $povez->save();
        return redirect('/settingsPovez');


    }

    
        public function delete($id){
            $povez = Povez::find($id)->delete();
        
            return redirect('/settingsPovez');
    }
} 
