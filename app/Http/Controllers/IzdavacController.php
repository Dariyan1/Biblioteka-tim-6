<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izdavac;
use App\Models\Knjiga;

class IzdavacController extends Controller
{
    public function index()
    {
        $izdavaci= Izdavac::all();
        return view('izdavac.index', ['izdavaci'=>$izdavaci]);
    }
    public function create()
    {
        return view('izdavac.create');
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'Naziv' => 'required'
        ]);

        $izdavac = new Izdavac();
        $izdavac->Naziv = $request->input('Naziv');
        $izdavac->save();


        if ($val) {
            return redirect()->route('izdavac.index');
        } else {
            return redirect()->route('izdavac.create')->with('fail', 'Popunite sva polja obilježena zvjezdicom');
        }
    }
    public function edit($id)
    {
        $izdavac = Izdavac::find($id);
        return view('izdavac.edit', ['izdavac'=>$izdavac]);
    
    }
    
    public function update($id, Request $request)
    {
        $val = $request->validate([
            'Naziv' => 'required'
        ]);
        $input = $request->all();
        $izdavac = Izdavac::find($id);
        $izdavac->Naziv = $input['Naziv'];
        $izdavac->save();


        if ($val) {
            return redirect()->route('izdavac.index');
        } else {
            return redirect()->route('izdavac.edit')->with('fail', 'Popunite sva polja obilježena zvjezdicom');
        }
    }

    
    public function destroy($id)
    {
            $izdavac = Izdavac::find($id)->delete();
            return redirect()->route('izdavac.index');
    }
}
