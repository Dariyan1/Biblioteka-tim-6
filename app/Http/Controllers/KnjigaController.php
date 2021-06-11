<?php

namespace App\Http\Controllers;

use App\Models\Knjiga;
use App\Models\KnjigaZanrovi;
use App\Models\AutorKnjiga;
use App\Models\Autor;
use App\Models\Zanrovi;
use App\Models\Jezik;
use App\Models\Pismo;
use App\Models\Format;
use App\Models\Povez;
use App\Models\Kategorije;
use App\Models\KategorijaKnjiga;
use Illuminate\Http\Request;
use App\Models\Izdavac;
use App\Models\Rezervacija;
use App\Models\Statusknjige;
use App\Models\Izdavanjestatusknjige;
Use App\Models\User;
use App\Models\Izdavanje;
use Illuminate\Support\Facades\DB;


class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knjige=Knjiga::with(['autors','zanrovis','kategorijes'])->get();
        return view('knjiga.index', ['knjige'=>$knjige]);
    }
    /*
      Start test
    */
    public function create0()
    {
        $kategorije=Kategorije::all();
        $zanri=Zanrovi::all();
        $autori=Autor::all();
        $izdavaci=Izdavac::all();
        $pisma=Pismo::all();
        $formati=Format::all();
        $jezici=Jezik::all();
        $povezi=Povez::all();
        return view('knjiga.create0', compact(
            'zanri',
            'autori',
            'kategorije',
            'pisma',
            'formati',
            'jezici',
            'povezi',
            'izdavaci'
        ));
    }

    /* kraj test*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorije=Kategorije::all();
        $zanri=Zanrovi::all();
        $autori=Autor::all();
        $izdavaci=Izdavac::all();
        $pisma=Pismo::all();
        $formati=Format::all();
        $jezici=Jezik::all();
        $povezi=Povez::all();
        return view('knjiga.create', compact(
            'zanri',
            'autori',
            'kategorije',
            'pisma',
            'formati',
            'jezici',
            'povezi',
            'izdavaci'
        ));
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
         'nazivKnjiga'=>'required',
         'kategorije'=>'required',
         'zanrovi'=>'required',
         'autori'=>'required',
         'izdavac'=>'required',
         'godina'=>'required',
         'knjigaKolicina'=>'required',
         'brStrana'=>'required',
         'pismo'=>'required',
         'jezik'=>'required',
         'format'=>'required',
         'povez'=>'required',
         'pismo'=>'required',
         'isbn'=>'required|min:20|max:20'
        ]);
        
        $autori=explode(',', $request->autori);
        $zanri=explode(',', $request->zanrovi);
        $kategorije=explode(',', $request->kategorije);
        $knjiga=Knjiga::create([
            'Naslov'=>$request->nazivKnjiga,
            'izdavac_id'=>$request->izdavac,
            'pismo_id'=>$request->pismo,
            'jezik_id'=>$request->izdavac,
            'format_id'=>$request->format,
            'povez_id'=>$request->povez,
            'BrojStrana'=>$request->brStrana,
            'DatumIzdavanja'=>$request->godina,
            'UkupnoPrimjeraka'=>$request->knjigaKolicina,
            'Sadrzaj'=>$request->kratki_sadrzaj,
            'ISBN'=>$request->isbn
           ]);
          
       
           $knjiga->autors()->attach($autori);
        
     
           $knjiga->zanrovis()->attach($zanri);
        
   
           $knjiga->kategorijes()->attach($kategorije);
       
        if ($knjiga) {
            return redirect()->route('knjiga.index')->with('success', 'Nova knjige je uspjesno dodata');
        }
        return redirect()->route('knjiga.index')->with('fail', 'Nova knjige nije uspjesno dodata');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function show(Knjiga $knjiga)
    {
        $knjiga=Knjiga::with('autors', 'zanrovis', 'kategorijes')->where('id', $knjiga->id)->first();
        return view('knjiga.show', compact('knjiga'));
    }
    public function spec(Knjiga $knjiga)
    {
        $knjiga=Knjiga::with('autors', 'zanrovis', 'kategorijes')->where('id', $knjiga->id)->first();
    
        return view('knjiga.spec', compact('knjiga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function edit(Knjiga $knjiga)
    {
        $knjiga=Knjiga::where('id', $knjiga->id)->with('autors', 'zanrovis', 'kategorijes')->first();
        $kategorije=Kategorije::all();
        $zanri=Zanrovi::all();
        $autori=Autor::all();
        $izdavaci=Izdavac::all();
        $pisma=Pismo::all();
        $formati=Format::all();
        $jezici=Jezik::all();
        $povezi=Povez::all();
        return view('knjiga.edit', compact(
            'knjiga',
            'zanri',
            'autori',
            'kategorije',
            'pisma',
            'formati',
            'jezici',
            'povezi',
            'izdavaci'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knjiga $knjiga)
    {
        $request->validate([
            'nazivKnjigaEdit'=>'required',
            'kategorije'=>'required',
            'zanrovi'=>'required',
            'autori'=>'required',
            'izdavacEdit'=>'required',
            'godinaIzdavanjaEdit'=>'required',
            'knjigaKolicinaEdit'=>'required',
            'brStranaEdit'=>'required',
            'pismo'=>'required',
            'jezik'=>'required',
            'format'=>'required',
            'povez'=>'required',
            'isbnEdit'=>'required|min:20|max:20'
        ]);
    
        $autori=explode(',', $request->autori);
        $zanri=explode(',', $request->zanrovi);
        $kategorije=explode(',', $request->kategorije);
       
        $knjiga1=Knjiga::find($knjiga->id);
        $knjiga1->Naslov=$request->nazivKnjigaEdit;
        $knjiga1->izdavac_id=$request->izdavacEdit;
        $knjiga1->pismo_id=$request->pismo;
        $knjiga1->jezik_id=$request->jezik;
        $knjiga1->format_id=$request->format;
        $knjiga1->povez_id=$request->povez;
        $knjiga1->BrojStrana=$request->brStranaEdit;
        $knjiga1->DatumIzdavanja=$request->godinaIzdavanjaEdit;
        $knjiga1->UkupnoPrimjeraka=$request->knjigaKolicinaEdit;
        $knjiga1->Sadrzaj=$request->kratki_sadrzaj;
        $knjiga1->ISBN=$request->isbnEdit;
        $knjiga=$knjiga1->save();
        
        $knjiga1->autors()->sync(array_values($autori));
        $knjiga1->zanrovis()->sync(array_values($zanri));
        $knjiga1->kategorijes()->sync(array_values($kategorije));
        if ($knjiga) {
            return redirect()->route('knjiga.index')->with('success', 'Knjige je uspjesno azurirana');
        } else {
            return redirect()->route('knjiga.index')->with('fail', 'Knjige nije uspjesno azurirana');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knjiga $knjiga)
    {
        $knjiga=Knjiga::where('id', $knjiga->id)->delete();
        if ($knjiga) {
            return redirect()->route('knjiga.index')->with('success', 'Knjige je uspjesno obrisana');
        } else {
            return redirect()->route('knjiga.index')->with('fail', 'Knjige nije uspjesno obrisana');
        }
    }

    public function izdavanje(Knjiga $knjiga){
        $knjiga=Knjiga::findOrFail($knjiga->id);
        $ucenici=User::ucenici();
          return view('knjiga.izdavanje',compact('knjiga','ucenici'));
    }


    public function iznajmljena(Knjiga $knjiga){
        $knjiga=Knjiga::findOrFail($knjiga->id);
        $izdate=Izdavanje::where('knjiga_id',$knjiga->id)->get();
        return view('knjiga.evidencija_iznajmljena',compact('knjiga','izdate'));
        }
    // funkcija za akciju izdaj knjigu
    public function izdaj(Request $request,Knjiga $knjiga){
         $request->validate([
            'ucenik'=>'required',
           'datumIzdavanja'=>'required',
           'datumVracanja'=>'required',
         ]);
        $datumVracanja=explode('/',$request->datumVracanja);
         $datumVracanja="$datumVracanja[2]-$datumVracanja[1]-$datumVracanja[0]";
         $izdavanje=Izdavanje::create([
          'knjiga_id'=>$knjiga->id,
          'izdaokorisnik_id'=>$request->user()->id,  //$request->izdao  auth()->user()->id
          'pozajmiokorisnik_id'=>$request->ucenik,
          'datumizdavanja'=>$request->datumIzdavanja,
          'datumvracanja'=>$datumVracanja
         ]);
        /* $izdavanje->izdataOd('knjiga_id','izdaokorisnik_id');
         $izdavanje->izdataZa('knjiga_id','pozajmiokorisnik_id');
         $izdavanje->izdaoKnjigu('izdaokorisnik_id','knjiga_id');
         $izdavanje->pozajmioKnjigu('pozajmiokorisnik_id','knjiga_id');*/
         $id=Statusknjige::where('Naziv','Izdata')->first()->id;
         $izdavanje->statusknjiges()->attach($id);
         if($izdavanje){
            $knjiga1=Knjiga::find($knjiga->id);
             // Kako da ubacimo tri parametra $knjiga1->iznajmili_ucenici()->attach($request->ucenik);
             $knjiga1->IzdatoPrimjeraka=$knjiga1->IzdatoPrimjeraka+1;
             $knjiga2=$knjiga1->save();
             if($knjiga2){
                 return  redirect()->route('knjiga.index')->with('success','Knjiga je uspjesno izdata');
               }
             }
         return redirect()->route('knjiga.index')->with('fail','Knjiga nije uspjesno izdata');
    }



    public function rezervacija(Knjiga $knjiga){
        $knjiga=Knjiga::findOrFail($knjiga->id);
        $ucenici=User::ucenici();
        return view('knjiga.rezervacija',compact('knjiga','ucenici'));

    }
   
    public function rezervisi(Request $request, Knjiga $knjiga){
     $request->validate([
      'ucenik'=>'required',
      'datumRezervisanja'=>'required'
     ]);
      $rezervacija=Rezervacija::create([
      'knjiga_id'=>$knjiga->id,
      'rezervisaokorisnik_id'=>1,                  //$request->izdao,
      'zakorisnik_id'=>$request->ucenik,
      'razlogzatvaranja_id'=>4,
      'datumpodnosenja'=>$request->datumRezervisanja,
      'datumrezervacije'=>$request->datumRezervisanja,
      'datumzatvaranja'=>$request->datumRezervisanja
     ]);
     if($rezervacija){
         $knjiga1=Knjiga::find($knjiga->id);
         $knjiga1->RezervisanoPrimjeraka=$knjiga1->RezervisanoPrimjeraka+1;
         $knjiga2=$knjiga1->save();
         if($knjiga2){
             return  redirect()->route('knjiga.index')->with('success','Knjiga je uspjesno rezervisana');
           }
         }
     return redirect()->route('knjiga.index')->with('fail','Knjiga nije uspjesno rezervisana');

    }

    public function vracanje(Knjiga $knjiga){
        $knjiga=Knjiga::findOrFail($knjiga->id);
        $sizdata=Statusknjige::where('Naziv','Izdata')->first()->id;
        $izdate=Izdavanje::where('knjiga_id',$knjiga->id)
                ->join('izdavanjestatusknjiges','izdavanjes.id','=','izdavanje_id')
                ->where('izdavanjestatusknjiges.statusknjige_id','=',$sizdata)
                ->get();
        return view('knjiga.vracanje',compact('knjiga','izdate'));

    }
    public function vrati(Request $request,Knjiga $knjiga){
        $request->validate([
            'vrati'=>'required'
        ]);
        $vracanje=[];
        for($i=0;$i<count($request->vrati);$i++):
            $j=$request->vrati[$i];
            $k='prekoracenje'.$j;
        if($request->$k=="0"):
        $vracanje[$i]=Izdavanjestatusknjige::where('izdavanje_id',$request->vrati[$i])->update([
            'statusknjige_id'=>DB::table('statusknjiges')->where('Naziv','Vracena')->first()->id
        ]);
        
        endif;
        if($request->$k=="1"):
        $vracanje[$i]=Izdavanjestatusknjige::where('izdavanje_id',$request->vrati[$i])->update([
                'statusknjige_id'=>DB::table('statusknjiges')->where('Naziv','Vracena sa prekoracenjem')->first()->id
        ]);
        endif;
        endfor;
            $trenutnoIzdato=$knjiga->IzdatoPrimjeraka-count($vracanje);
            $uknjiga=Knjiga::where('id',$knjiga->id)->update([
            'IzdatoPrimjeraka'=>$trenutnoIzdato
            ]);
            if(count($vracanje) && $uknjiga){
                return redirect()->route('knjiga.index')->with('success','Knjiga(e) uspjesno vracen(a)e');
            }
            return redirect()->route('knjiga.index')->with('fail','Knjiga(e) nije uspjesno vracen(a)e');           
    }

    
    public function otpisivanje(Knjiga $knjiga){
        $knjiga=Knjiga::findOrFail($knjiga->id);
        $sizdata=Statusknjige::where('Naziv','Izdata')->first()->id;
        $izdate=Izdavanje::where('knjiga_id',$knjiga->id)
                ->join('izdavanjestatusknjiges','izdavanjes.id','=','izdavanje_id')
                ->where('izdavanjestatusknjiges.statusknjige_id','=',$sizdata)
                ->get();
        return view('knjiga.otpisivanje',compact('knjiga','izdate'));

    }
    public function otpisati(Request $request,Knjiga $knjiga){
        $request->validate([
            'vrati'=>'required'
        ]);
        $vracanje=[];
        for($i=0;$i<count($request->vrati);$i++):
            $j=$request->vrati[$i];
            $k='prekoracenje'.$j;
        
        if($request->$k=="3"):
        $vracanje[$i]=Izdavanjestatusknjige::where('izdavanje_id',$request->vrati[$i])->update([
                'statusknjige_id'=>DB::table('statusknjiges')->where('Naziv','Otpisana')->first()->id
        ]);
        endif;
        endfor;
            $trenutnoIzdato=$knjiga->IzdatoPrimjeraka-count($vracanje);
            $uknjiga=Knjiga::where('id',$knjiga->id)->update([
            'IzdatoPrimjeraka'=>$trenutnoIzdato
            ]);
            if(count($vracanje) && $uknjiga){
                return redirect()->route('knjiga.index')->with('success','Knjiga(e) uspjesno vracen(a)e');
            }
            return redirect()->route('knjiga.index')->with('fail','Knjiga(e) nije uspjesno vracen(a)e');           
    }
}
