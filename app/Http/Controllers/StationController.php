<?php

namespace App\Http\Controllers;

use App\Imports\StationImport;
use App\Ligne;
use App\Station;
use Illuminate\Http\Request;
use Excel;

class StationController extends Controller
{

    public function indexstation()
    {

        $outletQuery = Station::query();
        $outletQuery->where('nom_ar', 'like', '%'.request('q').'%');
        $stations = $outletQuery->paginate(25);

        return view('stations.index', compact('stations'));


    }

    public function index1station()
    {
        $stations = Station::latest()->paginate(5);
        $lignes=Ligne::all();

        return view('stations.index1',
            ['stations'=>$stations,'lignes'=>$lignes])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function indexstationimport()
    {
        $stations = Station::latest()->paginate(5);
        $lignes=Ligne::all();

        return view('stations.indexstationimport',
            ['stations'=>$stations,'lignes'=>$lignes])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function addstation()
    {

        return view ('stations.add');

    }


    public function storestation(Request $request)
    {

        $request->validate(
            [
                "nombre"=>"required",
                "nom_fr"=>"required",
                "adresse"   => 'nullable|max:255',
                "nom_ar"=>"required",
                'latitude'  => 'nullable|required_with:longitude|max:20',
                'longitude' => 'nullable|required_with:latitude|max:20',



            ]
        );

        $station = new Station();
        $station->nombre = $request->nombre;
        $station->nom_fr = $request->nom_fr;
        $station->nom_ar = $request->nom_ar;
        $station->adresse = $request->adresse;
        $station->latitude = $request->latitude;
        $station->longitude = $request->longitude;
        $station->ligne_id = $request->ligne_id;
        $station->save();



        return redirect()->route('showstation', $station);


    }

    public function showstation(Request $request)
    {
        $station = Station::find($request->id);
        return view('stations.show', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editstation(Request $request)
    {
        $stations = Station::all();
        $station = Station::find($request->id);

        return view('stations.edit', compact('stations','station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function updatestation(Request $request, Station $station)
    {

        $station = Station::find($request->id);



        $station->nombre = $request->nombre;
        $station->nom_fr = $request->nom_fr;
        $station->nom_ar = $request->nom_ar;
        $station->adresse = $request->adresse;
        $station->latitude = $request->latitude;
        $station->longitude = $request->longitude;


        $station->save();

        return redirect()->route('indexstation', $station);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deletestation(Request $request, Station $station)
    {


        $request->validate(['station_id' => 'required']);

        if ($request->get('station_id') == $station->id && $station->delete()) {
            return redirect()->route('stations.index');
        }

        return back();
    }


    public function stationsearch(Request $request)
    {

        $data = Station::where('nombre', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('stations.search')->with([
            'stations' => $data,
        ]);
    }

    public function importFormStation()
    {
        return view ('stations.importForm');
    }

    public function importstation(Request $request ){

        Excel::import(new StationImport(),request()->file);
        return redirect('/indexstation');
    }
}
