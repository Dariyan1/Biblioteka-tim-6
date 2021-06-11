<?php

namespace App\Http\Controllers;

use App\Models\Izdavanje;
use App\Models\Izdavanjestatusknjige;
use App\Models\Knjiga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvidencijaController extends Controller
{
    public function index()
    {
        $izdavanje = Izdavanje::all();
        // $izdavanje = Izdavanje::whereRaw('DATEDIFF(now(), datumizdavanja) > 30')->get();

        $knjige = [];
        $korisnici = [];
        $brojac = -1;
        $izdatoKorisnicima = [];
        $statusiKnjiga = Izdavanjestatusknjige::all();
        foreach ($izdavanje as $izdaj) {
            array_push($knjige, Knjiga::findOrFail($izdaj->knjiga_id));
            array_push($korisnici, User::findOrFail($izdaj->izdaokorisnik_id));
            array_push($izdatoKorisnicima, User::findOrFail($izdaj->pozajmiokorisnik_id));
        }
        return view(
            'evidencija.index',
            [
                'knjige' => $knjige,
                'korisnici' => $korisnici,
                'brojac' => $brojac,
                'izdavanje' => $izdavanje,
                'izdatoKorisnicima' => $izdatoKorisnicima,
                'statusiKnjiga' => $statusiKnjiga,
            ]
        );
    }

    public function show($izdavanje_id)
    {
        $izdavanje = Izdavanje::findOrFail($izdavanje_id);
        $knjiga = Knjiga::findOrFail($izdavanje->knjiga_id);

        return view('evidencija.show', [
            'izdavanje' => $izdavanje,
            'knjiga' => $knjiga,
        ]);
    }
}
