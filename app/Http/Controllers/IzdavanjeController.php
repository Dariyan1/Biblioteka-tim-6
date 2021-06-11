<?php

namespace App\Http\Controllers;

use App\Models\Izdavanje;
use App\Models\User;
use App\Models\Globalnavarijabla;
use Illuminate\Http\Request;

class IzdavanjeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*  $izdavanje=new Izdavanje();
        $izdavanje->pozajmiokorisnik_id=$request->input('ucenik');
        $izdavanje->datumizdavanja=$request->input('datumizdavanja');
        $global=Globalnavarijabla::where('varijabla','ROK_VRACANJA');
        $izdavanje->datumvracanja=$request->input('datumizdavanja');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function show(Izdavanje $izdavanje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function edit(Izdavanje $izdavanje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Izdavanje $izdavanje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Izdavanje $izdavanje)
    {
        //
    }
}
