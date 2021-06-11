<?php

namespace App\Http\Controllers;
use App\Models\Nesto;
use Illuminate\Http\Request;

class NestoController extends Controller
{
    public function index (){
        return view ('nesto.index');
    }
}
