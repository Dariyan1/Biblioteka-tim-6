<?php

namespace App\Http\Controllers;

use App\Models\Bibliotekar;
use Illuminate\Http\Request;
use App\Models\Tipkorisnika;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BibliotekarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
            $bib= User::all()->where('tipkorisnika_id', '1');
            return view('bibliotekar.index' ,compact('bib'));
  /*$bib=[];
               if(Tipkorisnika::where('Naziv', 'Bibliotekar')->first()) {
                         $idb=Tipkorisnika::where('Naziv', 'Bibliotekar')->first()->id;
                         $bib=User::where('tipkorisnika_id', $idb)->get();
                }
         return view('bibliotekar.index', ['bib'=>$bib]);*/
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tip=Tipkorisnika::all();
        return view('bibliotekar.create', ['tip'=>$tip]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'imePrezimeBibliotekar' => 'required',
            'jmbgBibliotekar' => 'required',
            'emailBibliotekar' => 'required',
            'usernameBibliotekar' => 'required',
            'pwBibliotekar' => 'required',
            'pw2Bibliotekar' => 'required'
        ]);

        $bibliotekar=new User;
        $bibliotekar->ImePrezime=$request->imePrezimeBibliotekar;
        $bibliotekar->JMBG=$request->jmbgBibliotekar;
        $bibliotekar->email=$request->emailBibliotekar;
        $bibliotekar->name=$request->usernameBibliotekar;
        // $bibliotekar->password=Hash::make($request->pwBibliotekar);
        $bibliotekar->password=$request->pwBibliotekar;
        $bibliotekar->tipkorisnika_id=$request->tip_korisnika;

        //slika
        $request->validate([
            'foto'=>'nullable|image|max:2048'
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto')/*->crop(100 , 100 , 25 ,25)*/;
            $path = "/img/slikeKorisnici/slike-bibliotekari/{$file->getClientOriginalName()}" ;
            $request->foto->move(public_path('storage').'/img/slikeKorisnici/slike-bibliotekari/', $file->getClientOriginalName());
             /*public_path('storage')."/img/slikeKorisnici/slike-bibliotekari", $file->getClientOriginalName());*/
            $bibliotekar->Foto=$path;
        }
        

        $bibliotekar->save();
        return redirect()->route('bibliotekar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function show(User $bibliotekar)
    {
        $bibliotekar=User::where('id', $bibliotekar->id)->first();
    
        return view('bibliotekar.show', ['b'=>$bibliotekar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function edit(User $bibliotekar)
    {
        $bibliotekar=User::where('id', $bibliotekar->id)->first();
        $tip=Tipkorisnika::all();
        
        return view('bibliotekar.edit', ['b'=>$bibliotekar,'tip'=>$tip]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bibliotekar $bibliotekar)
    {


        $request->validate([
            'imePrezimeBibliotekarEdit' => 'required',
            'jmbgBibliotekarEdit' => 'required',
            'emailBibliotekarEdit' => 'required',
            'usernameBibliotekarEdit' => 'required',
            'pwBibliotekarEdit' => 'required',
            'pw2BibliotekarEdit' => 'required'
        ]);


        $bibliotekar=User::where('id', $bibliotekar->id)->first();
        $bibliotekar->ImePrezime=$request->imePrezimeBibliotekarEdit;
        $bibliotekar->JMBG=$request->jmbgBibliotekarEdit;
        $bibliotekar->email=$request->emailBibliotekarEdit;
        $bibliotekar->name=$request->usernameBibliotekarEdit;
        $bibliotekar->password=$request->pwBibliotekarEdit;
        $bibliotekar->tipkorisnika_id=$request->tip_korisnika;

        //files
    
        $request->validate([
            'foto'=>'nullable|image|max:2048'
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto')/*->crop(100,100,25,25)*/;
            $newpath = "/img/slikeKorisnici/slike-bibliotekari/{$file->getClientOriginalName()}" ;
            $request->foto->move(public_path('storage').'/img/slikeKorisnici/slike-bibliotekari/', $file->getClientOriginalName());
            $bibliotekar->Foto=$newpath;
        }
        
//dd($request->foto);
        $bibliotekar->save();
        return redirect()->route('bibliotekar.index')->with('Success', 'Promijenjen bibliotekar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bibliotekar $bibliotekar)
    {
        $bibliotekar=Bibliotekar::where('id', $bibliotekar->id)->delete();
        return redirect()->route('bibliotekar.index');
    }
}
