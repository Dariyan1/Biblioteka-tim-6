<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $izdavanja = DB::table('izdavanjes')
            ->join('users as izdao_user', 'izdao_user.id', '=', 'izdavanjes.izdaokorisnik_id')
            ->join('users as pozajmio_user', 'pozajmio_user.id', '=', 'izdavanjes.pozajmiokorisnik_id')
            ->join('knjigas', 'knjigas.id', '=', 'izdavanjes.knjiga_id')

            ->selectRaw(
                'izdao_user.ImePrezime izdao_user_ImePrezime,
                izdao_user.id izdao_user_id,

                pozajmio_user.ImePrezime pozajmio_user_ImePrezime,
                pozajmio_user.id pozajmio_user_id,

                knjigas.Naslov knjigaNaslov,
                izdavanjes.datumizdavanja datumizdavanja,
                izdavanjes.created_at created_at,
                izdavanjes.id id'
            )
            ->get();


        return view(
            'dashboard.index',
            [
                'izdavanja' => $izdavanja
            ]
        );
    }
}
