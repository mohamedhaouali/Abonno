<?php

namespace App\Http\Controllers;

use App\Municipalite;
use App\Region;
use Illuminate\Http\Request;
use App\Exports\MunicipaliteExport;
use App\Imports\MunicipaliteImport;
use Excel;


class MunicipaliteController extends Controller
{

    public function indexmunicipalite()
    {

     $municipalites = Municipalite::latest()->paginate(5);
     $regions = Region::all();

        return view('municipalites.index',
            ['municipalites'=>$municipalites,'regions'=>$regions])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexmunicipaliteimport()
    {
        $municipalites = Municipalite::latest()->paginate(5);
        $regions = Region::all();

        return view('municipalites.indexmunicipaliteimport',
            ['municipalites'=>$municipalites,'regions'=>$regions])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function addmunicipalite()
    {
        $municipalites=Municipalite::all();
        $regions=Region::all();


        return view ('municipalites.add',['regions'=>$regions,'municipalites'=>$municipalites,
            ]);
    }

    public function storemunicipalite(Request $request)
    {
        $request->validate(
            [
                "nom_fr"=>"required",
                "nom_ar"=>"required",
                "adresse"=>"required",
                "region_id" => "required|numeric",

            ]
        );


        $municipalite = new Municipalite();

        $municipalite->nom_fr = $request->nom_fr;
        $municipalite->nom_ar = $request->nom_ar;
        $municipalite->adresse = $request->adresse;
        $municipalite->region_id = $request->region_id;
        $municipalite->save();


        return redirect()
            ->route('indexmunicipalite')
            ->with('notice','municipalite <strong>'. $municipalite->name_fr. '</strong> a bien été ajouté');
    }


    public function editmunicipalite(Request $request){

        $municipalites=Municipalite::all();
        $regions=Region::all();

        $municipalite = Municipalite::find($request->id);




        return view ('municipalites.edit',[
            'municipalites'=>$municipalites,
            'municipalite'=>$municipalite, 'regions'=>$regions


        ]);
    }

    public function updatemunicipalite(Request $request) {

        $municipalite = Municipalite::find($request->id);

        $request->validate(
            [
                "nom_fr"=>"required",
                "nom_ar"=>"required",
                "adresse"=>"required",
                "region_id" => "required|numeric",


            ]
        );


        $municipalite->nom_fr = $request->nom_fr;
        $municipalite->nom_ar = $request->nom_ar;
        $municipalite->adresse = $request->adresse;
        $municipalite->region_id = $request->region_id;

        $municipalite->save();


        return redirect()->route('indexmunicipalite')->with('notice','municipalite <strong>'. $municipalite->name_fr. '</strong> a bien été modifié');

    }

    public function deletemunicipalite(Request $request) {

        $municipalite = Municipalite::find($request->id);
        $municipalite->delete();
        return redirect()->route('indexmunicipalite')
            ->with('notice','municipalite <strong>'.$municipalite->nom_fr. '</strong> a été supprimé');
    }

    public function importFormMunicipalite()
    {
        return view ('municipalites.import-form');
    }

    public function importMunicipalite(Request $request ){

        Excel::import(new MunicipaliteImport,request()->file);
        return redirect('/indexmunicipalite');
    }
}
