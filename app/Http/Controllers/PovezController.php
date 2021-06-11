<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Povez;

class PovezController extends Controller
{
    public function index()
    {
        $povezi= Povez::all();
        return view('povez.index', ['povezi'=>$povezi]);
    }
    public function create()
    {
        return view('povez.create');
    }
    public function store(Request $request)
    {
        $val = $request->validate([
            'Naziv' => 'required'
        ]);
        $povez = new Povez();
        $povez->Naziv = $request->input('Naziv');
        if ($val) {
            $povez->save();
            return redirect()->route('povez.index');
        } else {
            return redirect()->route('povez.create')->with('fail', 'neuspjesno');
        }
    }
    public function edit($id)
    {
        $povez = Povez::find($id);
        return view('povez.edit', compact('povez'));
    }
    
    public function update($id, Request $request)
    {
        $val = $request->validate([
          'Naziv' => 'required'
        ]);
        $input = $request->all();
        $povez = Povez::find($id);
        $povez->Naziv = $input['Naziv'];
        if ($val) {
            $povez->save();
            return redirect()->route('povez.index');
        } else {
            return redirect()->route('povez.edit')->with('fail', 'neuspjesno');
        }
    }

    
    public function destroy($id)
    {
        $povez = Povez::find($id)->delete();
        return redirect()->route('povez.index');
    }
}
