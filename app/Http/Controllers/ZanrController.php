<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zanr;

class ZanrController extends Controller
{
    public function index(){
        $zanr= Zanr::all(); 
        return view('/zanr.index', ['zanr'=>$zanr]);
    }
    public function create(){
        return view('/zanr.create');
    }
    public function store(Request $request){
        $zanr = new Zanr();
        $zanr->naziv = $request->input('naziv');
        $zanr->save();
        return redirect('/settingsZanrovi');
    }
    public function edit($id){
        $zanr = zanr::find($id);
        return view('/zanr.edit', compact('zanr'));
   
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $zanr = Zanr::find($id);
        $zanr->naziv = $input['naziv'];
        $zanr->save();
        return redirect('/settingsZanrovi');


    }

    
        public function delete($id){
            $zanr = Zanr::find($id)->delete();
        
            return redirect('/settingsZanrovi');
    }
} 
