<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorije;
use Image;

class KategorijeController extends Controller
{
    public function index()
    {
        $kategorije= Kategorije::all();
        return view('kategorije.index', ['kategorije'=>$kategorije]);
    }
    public function create()
    {
        return view('kategorije.create');
    }
    public function store(Request $request)
    {
        $kategorije = new Kategorije();
        $request->validate([
            'ikonica'=>'nullable|image|max:2048',
            'Naziv' => 'required'
        ]);

        if ($request->file('ikonica')) {
            $file = $request->file('ikonica');
            $path = "storage/slika/slike-kategorija/{$file->getClientOriginalName()}" ;
            $file->storeAs("/public/slike/slike-kategorija", $file->getClientOriginalName());
            $kategorije->Ikonica = $path;
        }

        
        $kategorije->Naziv = $request->input('Naziv');
        $kategorije->Opis = $request->input('Opis');
        $kategorije->save();

        return redirect()->route('kategorije.index');
    }
    public function edit($id)
    {
        $kategorije = Kategorije::find($id);
        return view('kategorije.edit', compact('kategorije'));
    }
    
    public function update($id, Request $request)
    {
        $kategorije = Kategorije::where('id', $id)->first();
        $request->validate([
            'ikonica'=>'nullable|image|max:2048',
            'Naziv' => 'required'
        ]);

        if ($request->file('ikonica')) {
            $file = $request->file('ikonica');
            $newpath = "storage/slika/slike-kategorija/{$file->getClientOriginalName()}" ;
            $file->storeAs("/public/slike/slike-kategorija", $file->getClientOriginalName());
            $kategorije->Ikonica = $newpath;
        }

        
        $input = $request->all();
        $kategorije->Naziv = $input['Naziv'];
        $kategorije->Opis = $input['Opis'];
        $kategorije->save();

        return redirect()->route('kategorije.index');
    }

    
    public function destroy($id)
    {
        $kategorije = Kategorije::find($id)->delete();
        

        return redirect()->route('kategorije.index');
    }
}
