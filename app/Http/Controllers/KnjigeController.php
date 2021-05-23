<?php

namespace App\Http\Controllers;

use App\Models\Knjige;
use Illuminate\Http\Request;

class KnjigeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $knjige= Knjige::all(); 
        return view('knjige.index', ['knjige'=>$knjige]);
    }
    public function create(){
        return view('knjige.create');
    }
    public function creates(){
        return view('knjige.creates');
    }
    public function createm(){
        return view('knjige.createm');
    }
    public function store(Request $request){
        $knjige = new Knjige();
        $knjige->naslov = $request->input('naslov');
        $knjige->brojStrana= $request->input('brojStrana');
        $knjige->pismo_id= $request->input('pismo_id');
        $knjige->jezik_id=$request->input('jezik_id');
        $knjige->povez_id=$request->input('povez_id');
        $knjige->format_id=$request->input('format_id');
        $knjige->izdavac_id=$request->input('izdavac_id');
        $knjige->autor_id=$request->input('autor_id');
        $knjige->kategorija_id=$request->input('kategorija_id');
        $knjige->zanr_id=$request->input('zanr_id');
        $knjige->datumIzdavanja=$request->input('datumIzdavanja');
        $knjige->ISBN=$request->input('ISBN');
        $knjige->ukupnoPrimjeraka=$request->input('ukupnoPrimjeraka');
        $knjige->rezervisanoPrimjeraka=$request->input('rezervisanoPrimjeraka');
        $knjige->izdatoPrimjeraka=$request->input('izdatoPrimjeraka');
        $knjige->sadrzaj=$request->input('sadrzaj');
        



        $knjige->save();
        return redirect('/autori');
    }
    public function edit($id){
        $autor = Autor::find($id);
        return view('knjige.edit', compact('knjige'));
   
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $autor = Autor::find($id);
        $knjige = new Knjige();
        $knjige->naslov = $input['naslov'];
        $knjige->brojStrana= $input['brojStrana'];
        $knjige->pismo_id= $input['pismo_id'];
        $knjige->jezik_id=$input['jezik_id'];
        $knjige->povez_id=$input['povez_id'];
        $knjige->format_id=$input['format_id'];
        $knjige->izdavac_id=$input['izdavac_id'];
        $knjige->autor_id=$input['autor_id'];
        $knjige->kategorija_id=$input['kategorija_id'];
        $knjige->zanr_id=$input['zanr_id'];
        $knjige->datumIzdavanja=$input['datumIzdavanja'];
        $knjige->ISBN=$input['ISBN'];
        $knjige->ukupnoPrimjeraka=$input['ukupnoPrimjeraka'];
        $knjige->rezervisanoPrimjeraka=$input['rezervisanoPrimjeraka'];
        $knjige->izdatoPrimjeraka=$input['izdatoPrimjeraka'];
        $knjige->sadrzaj=$input['sadrzaj'];
        $autor->save();
        return redirect('/knjige');


    }

    
        public function delete($id){
            $knjige = Knjige::find($id)->delete();
        
            return redirect('/knjige');
    }

        public function desck($id) {
            $knjige = Knjige::find($id);
            return view('knjige.desck', compact('knjige'));
        }
}
