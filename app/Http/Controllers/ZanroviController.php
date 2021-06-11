<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zanrovi;

class ZanroviController extends Controller
{
    public function index()
    {
        $zanrovi= Zanrovi::all();
        return view('zanrovi.index', ['zanrovi'=>$zanrovi]);
    }
    public function create()
    {
        return view('zanrovi.create');
    }
    public function store(Request $request)
    {
        $val = $request->validate([
            'Naziv' => 'required']);
        if ($val) {
            $zanrovi = new Zanrovi();
            $zanrovi->naziv = $request->input('Naziv');
            $zanrovi->save();

            return redirect()->route('zanrovi.index');
        } else {
            return redirect()->route('zanrovi.update')->with('fail', 'neuspjesno');
        }
    }
    public function edit($id)
    {
        $zanrovi = Zanrovi::find($id);
        return view('zanrovi.edit', compact('zanrovi'));
    }
    
    public function update($id, Request $request)
    {
        $val = $request->validate([
            'Naziv' => 'required'
        ]);
        $input = $request->all();
        $zanrovi = Zanrovi::find($id);
        $zanrovi->Naziv = $input['Naziv'];
        if ($val) {
            $zanrovi->save();

            return redirect()->route('zanrovi.index');
        } else {
            return redirect()->route('zanrovi.update')->with('fail', 'neuspjesno');
        }
    }

    
    public function destroy($id)
    {
        $zanrovi = Zanrovi::find($id)->delete();
        

        return redirect()->route('zanrovi.index');
    }
}
