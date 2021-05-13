<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Format;

class FormatController extends Controller
{
    public function index(){
        $format= Format::all(); 
        return view('format.index', ['format'=>$format]);
    }
    public function create(){
        return view('format.create');
    }
    public function store(Request $request){
        $format = new Format();
        $format->naziv = $request->input('naziv');
        $format->save();
        return redirect('/settingsFormat');
    }
    public function edit($id){
        $format = format::find($id);
        return view('format.edit', compact('format'));
   
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $format = Format::find($id);
        $format->naziv = $input['naziv'];
        $format->save();
        return redirect('/settingsFormat');


    }

    
        public function delete($id){
            $format = Format::find($id)->delete();
        
            return redirect('/settingsFormat');
    }
} 
