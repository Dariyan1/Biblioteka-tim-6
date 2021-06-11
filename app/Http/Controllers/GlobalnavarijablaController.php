<?php

namespace App\Http\Controllers;

use App\Models\Globalnavarijabla;
use Illuminate\Http\Request;

class GlobalnavarijablaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $globalnavarijabla = Globalnavarijabla::all();

        $globalnaV = [];
        foreach ($globalnavarijabla as $gv) {
            $globalnaV[$gv->varijabla] = $gv;
        }

        return view('polisa.index', ['Globalnavarijabla'=>$globalnaV]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $globalV = ['ROK_ZA_REZERVACIJU','ROK_VRACANJA','ROK_KONFLIKTA'];

        foreach ($globalV as $gv) {
            $postojecaV = Globalnavarijabla::where('varijabla', $gv)->first();
            if ($postojecaV) {
                $postojecaV->vrijednost = $request->input($gv);
                $postojecaV->save();
            } else {
                $novaV = new Globalnavarijabla();
                $novaV->varijabla = $gv;
                $novaV->vrijednost = $request->input($gv);
                $novaV->save();
            }
        }
        return redirect()->route('polisa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Globalnavarijabla  $globalnavarijabla
     * @return \Illuminate\Http\Response
     */
    public function show(Globalnavarijabla $globalnavarijabla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Globalnavarijabla  $globalnavarijabla
     * @return \Illuminate\Http\Response
     */
    public function edit(Globalnavarijabla $globalnavarijabla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Globalnavarijabla  $globalnavarijabla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Globalnavarijabla $globalnavarijabla)
    {
        $globalnavarijabla->Vrijednost = $input['Vrijednost'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Globalnavarijabla  $globalnavarijabla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Globalnavarijabla $globalnavarijabla)
    {
        //
    }
}
