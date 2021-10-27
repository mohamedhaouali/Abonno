<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Ligne;
use Illuminate\Http\Request;
use App\Imports\LigneImport;
use App\Exports\LigneExport;
use Excel;
use App\Station;
use App\Lignestation;


class LigneController extends Controller
{

    public function indexligne()
    {
        //relation many to many get pour recuperer les stations
        $lignes = Ligne::with('stations')->get();
        return view('lignes.index',compact('lignes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);



    }

    public function indexligneimport()
    {
        $lignes = Ligne::latest()->paginate(5);

        return view('lignes.indexligneimport'
            ,compact('lignes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }



    public function addligne () {

        $lignes = new Ligne;
        $stations = Station::all();

        return view ('lignes.add',['lignes'=>$lignes,'stations'=>$stations

        ]);
    }


    public function storeligne(Request $request)
    {
        $request->validate(
            [   'nom_fr' => 'required',
                'nom_ar' => 'required',
                'num' => 'required|unique:lignes,num',
                'distance'=> 'required|numeric',
                'prix'=>'required|regex:/^\d+(\.\d{1,4})?$/',
                'lignedebut' => 'required',
                'lignefin' => 'required',
            ]
        );

        $ligne_id=Ligne::create($request->all())->id;
        foreach ($request->stations as $station) {
            LigneStation::create([
                'ligne_id'=>$ligne_id,
                'station_id'=>$station
            ]);
        }


        return redirect()
            ->route('indexligne')
            ->with('notice','ligne  a bien été ajouté');
    }

    public function showligne(Request $request)
    {

        $ligne = Ligne::find($request->id);
        return view('lignes.show',compact('ligne'));
    }
    public function editligne (Request $request)
    {
        $lignes = Ligne::all();


        $ligne = Ligne::find($request->id);

        return view ('lignes.edit',[
            'lignes'=>$lignes,
            'ligne'=>$ligne

        ]);
    }

    public function updateligne(Request $request, Ligne $ligne)
    {
        $ligne = Ligne::find($request->id);

        $request->validate([
            'nom_fr' => 'required',
            'nom_ar' => 'required',
            'num' => 'required',
            'distance'=> 'required|numeric',
            'prix'=>'required|regex:/^\d+(\.\d{1,4})?$/',
            'lignedebut' => 'required',
            'lignefin' => 'required',

        ]);

        $ligne->nom_fr = $request->nom_fr;
        $ligne->nom_ar = $request->nom_ar;
        $ligne->num = $request->num;
        $ligne->distance = $request->distance;

        $ligne->prix = $request->prix;
        $ligne->lignedebut = $request->lignedebut;
        $ligne->lignefin = $request->lignefin;


        $ligne->save();

        return redirect()->route('indexligne')
            ->with('success','Line updated successfully');
    }



    public function deleteligne(Ligne $ligne) {

        $ligne->delete();

        return redirect()->route('indexligne')
            ->with('success','line deleted successfully');
    }

    public function lignesearch(Request $request)
    {

        $data = Ligne::where('num', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('lignes.search')->with([
            'lignes' => $data,
        ]);
    }

    public function importFormligne()
    {
        return view ('lignes.import-form');
    }

    public function importligne(Request $request ){

        Excel::import(new LigneImport,request()->file);
        return redirect('/indexligne');
    }



}
