<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function index()
    {
        $formati = Format::all();

        return view('format.index', ['formati'=>$formati]);
    }

    public function create()
    {
        return view('format.create');
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'Naziv' => 'required'
        ]);

        $format = new Format();
        $format->naziv = $request->input('Naziv');
        if ($val) {
            $format->save();

            return redirect()->route('format.index');
        } else {
            return redirect()->route('format.create')-> with('success', 'uspjesno');
        }
    }


    public function edit($id)
    {
        $format = Format::find($id);
       
        return view('format.edit', compact('format'));
    }

    public function update($id, Request $request)
    {
        $val = $request->validate([
            'Naziv' => 'required'
        ]);
        $input = $request->all();
        $format = Format::find($id);

        $format->Naziv = $input['Naziv'];
        $format->save();
        if ($val) {
            return redirect()->route('format.index');
        } else {
            return redirect()->route('format.update')-> with('fail', 'neuspjesno');
        }
    }

    public function destroy($id)
    {
        $format = Format::find($id)->delete();
        

        return redirect()->route('format.index');
    }
}
