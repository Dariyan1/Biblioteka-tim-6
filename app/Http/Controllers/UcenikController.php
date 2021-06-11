<?php

namespace App\Http\Controllers;

use App\Models\Ucenik;
use Illuminate\Http\Request;
use App\Models\Tipkorisnika;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UcenikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ucenici= User::all()->where('tipkorisnika_id', '2');
            return view('ucenik.index' ,compact('ucenici'));


       /* $ucenici=[];
        if(Tipkorisnika::where('Naziv', 'Ucenik')->first())   {
        $tipid=Tipkorisnika::where('Naziv', 'Ucenik')->first()->id;
        $ucenici=User::where('tipkorisnika_id', $tipid)->get();
        
         }
         return view('ucenik.index', ['ucenici'=>$ucenici]); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tip=Tipkorisnika::all();

        return view('ucenik.create', ['tip'=>$tip]);
        
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
            'imePrezimeUcenik' => 'required',
            'jmbgUcenik' => 'required',
            'emailUcenik' => 'required',
            'usernameUcenik' => 'required',
            'pwUcenik' => 'required',
            'pw2Ucenik' => 'required'
        ]);
        /*$ucenik=new Korisnik;
        $ucenik->ImePrezime = $request->input('ImePrezimeUcenik');
        $ucenik->JMBG = $request->input('jmbgUcenik');
        $ucenik->Email = $request->input('emailUcenik');
        $ucenik->name = $request->input('usernameUcenik');
        $ucenik->password = $request->input('pwUcenik');
        $ucenik->tipkorisnika_id = $request->input('tip_korisnika');
        $ucenik->save();*/
        
        $ucenik=new User;
        $ucenik->imePrezime=$request->imePrezimeUcenik;
        $ucenik->JMBG=$request->jmbgUcenik;
        $ucenik->email=$request->emailUcenik;
        $ucenik->name=$request->usernameUcenik;
        // $ucenik->password=Hash::make($request->pwUcenik);
        $ucenik->password=$request->pwUcenik;
        $ucenik->tipkorisnika_id=$request->tip_korisnika;
        

        //slika
        $request->validate([
            'foto'=>'nullable|image|max:2048'
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto')/*->crop(100,100,25,25)*/;
            $path = "/img/slikeKorisnici/slike-ucenici/{$file->getClientOriginalName()}" ;
            $request->foto->move(public_path('storage').'/img/slikeKorisnici/slike-ucenici/', $file->getClientOriginalName());
            $ucenik->Foto=$path;
        }
        


        $ucenik->save();

        return redirect()->route('ucenik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function show(User $ucenik)
    {
        $ucenik = User::find($ucenik->id);
        return view('ucenik.show', ['u'=>$ucenik]);

        // $ucenik=Korisnik::where('id',$ucenik->id)->first();
    
        // return view('ucenik.show',['u'=>$ucenik]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function edit(User $ucenik)
    {
        $ucenik=User::where('id', $ucenik->id)->first();
        $tip=Tipkorisnika::all();
        //'t'=>$tip
        return view('ucenik.edit', ['u'=>$ucenik,'tip'=>$tip]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ucenik $ucenik)
    {

        $request->validate([
            'imePrezimeUcenikEdit' => 'required',
            'jmbgUcenikEdit' => 'required',
            'emailUcenikEdit' => 'required',
            'usernameUcenikEdit' => 'required',
            'pwUcenikEdit' => 'required',
            'pw2UcenikEdit' => 'required'
        ]);

        $ucenik=User::where('id', $ucenik->id)->first();
        $ucenik->ImePrezime=$request->imePrezimeUcenikEdit;
        $ucenik->JMBG=$request->jmbgUcenikEdit;
        $ucenik->email=$request->emailUcenikEdit;
        $ucenik->name=$request->usernameUcenikEdit;
        $ucenik->password=$request->pwUcenikEdit;
        $ucenik->tipkorisnika_id=$request->tip_korisnika;

        //slika
        /*$request->validate([
            'foto'=>'nullable|image|max:2048'
        ]);*/

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $newpath = "/img/slikeKorisnici/slike-ucenici/{$file->getClientOriginalName()}" ;
            $request->foto->move(public_path('storage').'/img/slikeKorisnici/slike-ucenici/', $file->getClientOriginalName());
            $ucenik->Foto=$newpath;
        }
        



        $ucenik->save();
        return redirect()->route('ucenik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ucenik $ucenik)
    {
        $ucenik=Ucenik::where('id', $ucenik->id)->delete();
        return redirect()->route('ucenik.index');
    }
}
