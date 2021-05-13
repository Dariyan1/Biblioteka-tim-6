<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pismo;

class PismoController extends Controller
{
    public function index(){
        $pismo= Pismo::all(); 
        return view('pismo.index', ['pismo'=>$pismo]);
    }
    public function create(){
        return view('pismo.create');
    }
    public function store(Request $request){
        $pismo = new Pismo();
        $pismo->naziv = $request->input('naziv');
        $pismo->save();
        return redirect('/settingsPismo');
    }
    public function edit($id){
        $pismo = Pismo::find($id);
        return view('pismo.edit', compact('pismo'));
 
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $pismo = Pismo::find($id);
        $pismo->naziv = $input['naziv'];
        $pismo->save();
        return redirect('/settingsPismo');


    }

    
        public function delete($id){
            $pismo = Pismo::find($id)->delete();
        
            return redirect('/settingsPismo');
    }
} 
