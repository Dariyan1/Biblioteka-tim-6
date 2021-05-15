<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izdavac;

class IzdavacController extends Controller
{
    public function index(){
        $izdavac= Izdavac::all(); 
        return view('izdavac.index', ['izdavac'=>$izdavac]);
    }
    public function create(){
        return view('izdavac.create');
    }
    public function store(Request $request){
        $izdavac = new Izdavac();
        $izdavac->naziv = $request->input('naziv');
        $izdavac->save();
        return redirect('/settingsIzdavac');
    }
    public function edit($id){
        $izdavac = Izdavac::find($id);
        return view('izdavac.edit', compact('izdavac'));
 
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $izdavac = Izdavac::find($id);
        $izdavac->naziv = $input['naziv'];
        $izdavac->save();
        return redirect('/settingsIzdavac');


    }

    
        public function delete($id){
            $izdavac = Izdavac::find($id)->delete();
        
            return redirect('/settingsIzdavac');
    }
} 
