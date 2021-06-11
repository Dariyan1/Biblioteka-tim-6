<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pismo;

class PismoController extends Controller
{
    public function index()
    {
        $pisma = Pismo::all();
        return view('pismo.index', ['pisma' => $pisma]);
    }
    public function create()
    {
        return view('pismo.create');
    }
    public function store(Request $request)
    {
        $val = $request->validate([
        'naziv' => 'required']);
        
        $pismo = new Pismo();
    
        $pismo->naziv = $request->input('naziv');
        if ($val) {
            $pismo->save();
            return redirect()->route('pismo.index');
        } else {
            return redirect()->route('pismo.create')->with('fail', 'neuspjesno');
        }
    }


    public function update($id, Request $request)
    {
        $val = $request->validate([
        'Naziv' => 'required'
    ]);
        $input = $request->all();
        $pismo = Pismo::find($id);
        $pismo->Naziv = $input['naziv'];
        if ($val) {
            $pismo->save();
            return redirect()->route('pismo.index');
        } else {
            return redirect('pismo.update', with('success', 'uspjesno'));
        }
    }
    public function edit($id)
    {
        $pismo = Pismo::find($id);
        return view('pismo.edit', compact('pismo'));
    }
    
   


    public function destroy($id)
    {
        $pismo = Pismo::find($id)->delete();
   
        return redirect()->route('pismo.index');
    }
}
