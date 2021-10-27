<?php

namespace App\Http\Controllers;

use App\Etablissement;
use App\Typesetablissement;
use App\Niveauscolaire;
use App\Municipalite;
use Illuminate\Http\Request;
use App\Exports\EtablissementExport;
use App\Imports\EtablissementImport;
use Excel;

class EtablissementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexetablissement()
    {
        $etablissements = Etablissement::latest()->paginate(5);
        $municipalites=Municipalite::all();
        $niveauscolaires=Niveauscolaire::all();
        $typesetablissements = Typesetablissement::all();

        return view('etablissements.index', compact(
            'etablissements','municipalites'
            ,'typesetablissements','niveauscolaires'
        ))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexetablissementimport()
    {
        $etablissements = Etablissement::latest()->paginate(5);
        $municipalites=Municipalite::all();
        $niveauscolaires=Niveauscolaire::all();
        $typesetablissements = Typesetablissement::all();

        return view('etablissements.indexetablissementimport', compact(
            'etablissements','municipalites'
            ,'typesetablissements','niveauscolaires'
        ))
            ->with('i', (request()->input('page', 1) - 1) * 5);



    }



    public function addetablissement()
    {
        $etablissements = Etablissement::latest()->paginate(5);
        $municipalites=Municipalite::all();
        $niveauscolaires=Niveauscolaire::all();
        $typesetablissements = Typesetablissement::all();

        return view ('etablissements.add',['etablissements'=>$etablissements,
            'municipalites'=>$municipalites,
            'niveauscolaires'=>$niveauscolaires,'typesetablissements'=>$typesetablissements ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function storeetablissement(Request $request)
    {
        $request->validate(
            [
                "nom_fr"=>"required",
                "nom_ar"=>"required",
                "adresse"=>"required",
                "typesetablissement_id" =>"required|numeric",
                "municipalite_id" =>"required|numeric",
                "niveauscolaire_id" => "required|numeric",

            ]
        );


        $etablissement = new Etablissement();

        $etablissement->nom_fr = $request->nom_fr;
        $etablissement->nom_ar = $request->nom_ar;
        $etablissement->adresse = $request->adresse;
        $etablissement->typesetablissement_id = $request->typesetablissement_id;
        $etablissement->municipalite_id = $request->municipalite_id;
        $etablissement->niveauscolaire_id = $request->niveauscolaire_id;
        $etablissement->save();



        return redirect()
            ->route('indexetablissement')
            ->with('notice','Etablissement <strong>'. $etablissement->nom_ar. '</strong> a bien été ajouté');
    }




    public function editetablissement(Request $request){

        $etablissements = Etablissement::all();
        $municipalites=Municipalite::all();
        $niveauscolaires=Niveauscolaire::all();
        $typesetablissements = Typesetablissement::all();

        $etablissement = Etablissement::find($request->id);


        return view ('etablissements.edit',[
            'etablissements'=>$etablissements,'municipalites'=>$municipalites,
            'etablissement'=>$etablissement, 'typesetablissements'=>$typesetablissements,
            'niveauscolaires'=>$niveauscolaires

        ]);
    }


    public function updateetablissement(Request $request) {

        $etablissement = Etablissement::find($request->id);

        $request->validate(
               ['nom_fr'=>'required',
                'nom_ar'=>'required',
                'adresse'=>'required',
                'typesetablissement_id' =>'required|numeric',
                'municipalite_id' =>'required|numeric',
                'niveauscolaire_id' => 'required|numeric',

            ]
        );


        $etablissement->nom_fr = $request->nom_fr;
        $etablissement->nom_ar = $request->nom_ar;
        $etablissement->adresse = $request->adresse;
        $etablissement->typesetablissement_id = $request->typesetablissement_id;
        $etablissement->municipalite_id = $request->municipalite_id;
        $etablissement->niveauscolaire_id = $request->niveauscolaire_id;


        $etablissement->save();


        return redirect()->route('indexetablissement')->with('notice','etablissement <strong>'. $etablissement->nom_fr. '</strong> a bien été modifié');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function deleteetablissement(Request $request) {

        $etablissement = Etablissement::find($request->id);
        $etablissement->delete();
        return redirect()->route('indexetablissement')
            ->with('notice','etablishment <strong>'.$etablissement->nom_fr. '</strong> a été supprimé');
    }

    public function etablissementsearch(Request $request)
    {

        $data = Etablissement::where('nom_fr', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('etablissements.search')->with([
            'etablissements' => $data,
        ]);
    }

    public function importFormEtablissement()
    {
        return view ('etablissements.import-form');
    }

    public function importEtablissement(Request $request ){

        Excel::import(new EtablissementImport,request()->file);
        return redirect('/indexetablissement');
    }

}
