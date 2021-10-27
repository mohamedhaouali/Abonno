<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Etablissement;
use App\Etudiant;
use App\Niveauscolaire;
use App\Periodeabonnement;
use App\Abonnementsociale;
use App\Payementtype;
use App\Region;
use App\Municipalite;
use App\Ligne;
use App\Annee;
use App\Typedepaiement;
use Illuminate\Http\Request;
use App\Exports\AbonnementsocialeExport;
use App\Imports\AbonnementsocialeImport;
use Excel;
use PDF;
use App\Station;

class AbonnementsocialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexabonnementsociale()
    {
        $abonnementsociales = Abonnementsociale::latest()->paginate(5);
        $regions = Region::all();
        $municipalites = Municipalite::all();
        $periodeabonnements = Periodeabonnement::all();
        $lignes = Ligne::all();

        $etudiants = Etudiant::all();
        $niveauscolaires = Niveauscolaire::all();
        $classes = Classe::all();
        $etablissements = Etablissement::all();
        $typedepaiements = Typedepaiement::all();
        $annees = Annee::all();
        $stations = Station::all();

        return view('abonnementsociales.index',
            ['abonnementsociales'=>$abonnementsociales,'municipalites'=>$municipalites,
              'regions'=>$regions,'lignes'=>$lignes,'lignes'=>$lignes,
                'periodeabonnements'=>$periodeabonnements,'etudiants'=>$etudiants,
                'niveauscolaires'=>$niveauscolaires,'classes'=>$classes,'etablissements'=>$etablissements,
                'typedepaiements'=>$typedepaiements,'annees'=>$annees,'stations'=>$stations
                ])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


// import Excel 1

    public function indexabonnementsocialeimport()
    {
        $abonnementsociales = Abonnementsociale::latest()->paginate(5);
        $regions = Region::all();
        $municipalites = Municipalite::all();
        $periodeabonnements = Periodeabonnement::all();
        $lignes = Ligne::all();

        $etudiants = Etudiant::all();
        $niveauscolaires = Niveauscolaire::all();
        $classes = Classe::all();
        $etablissements = Etablissement::all();
        $typedepaiements = Typedepaiement::all();
        $annees = Annee::all();
        $stations = Station::all();

        return view('abonnementsociales.indexabonnementsocialeimport',
            ['abonnementsociales'=>$abonnementsociales,'municipalites'=>$municipalites,
                'regions'=>$regions,'lignes'=>$lignes,'lignes'=>$lignes,
                'periodeabonnements'=>$periodeabonnements,'etudiants'=>$etudiants,
                'niveauscolaires'=>$niveauscolaires,'classes'=>$classes,'etablissements'=>$etablissements,
                'typedepaiements'=>$typedepaiements,'annees'=>$annees,'stations'=>$stations
            ])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function addabonnementsociale () {

        $abonnementsociales = Abonnementsociale::latest()->paginate(5);
        $regions = Region::all();
        $municipalites = Municipalite::all();
        $periodeabonnements = Periodeabonnement::all();
        $lignes = Ligne::all();

        $etudiants = Etudiant::all();
        $niveauscolaires = Niveauscolaire::all();
        $classes = Classe::all();
        $etablissements = Etablissement::all();
        $typedepaiements = Typedepaiement::all();
        $annees = Annee::all();
        $stations = Station::all();

        return view ('abonnementsociales.add',
            ['abonnementsociales'=>$abonnementsociales,'municipalites'=>$municipalites,
                'regions'=>$regions,'lignes'=>$lignes,'lignes'=>$lignes,
                'periodeabonnements'=>$periodeabonnements,'etudiants'=>$etudiants,
                'niveauscolaires'=>$niveauscolaires,'classes'=>$classes,'etablissements'=>$etablissements,
                'typedepaiements'=>$typedepaiements,'annees'=>$annees ,'stations'=>$stations

        ]);
    }

    public function editabonnementsociale(Request $request){

        $abonnementsociales = Abonnementsociale::all();
        $regions = Region::all();
        $municipalites = Municipalite::all();
        $periodeabonnements = Periodeabonnement::all();
        $lignes = Ligne::all();

        $etudiants = Etudiant::all();
        $niveauscolaires = Niveauscolaire::all();
        $classes = Classe::all();
        $etablissements = Etablissement::all();
        $typedepaiements = Typedepaiement::all();
        $annees = Annee::all();
        $stations = Station::all();



        $abonnementsociale = Abonnementsociale::find($request->id);


        return view ('abonnementsociales.edit',[
            'abonnementsociales'=>$abonnementsociales,'municipalites'=>$municipalites,
            'regions'=>$regions,'lignes'=>$lignes,
            'etudiants'=>$etudiants,
            'niveauscolaires'=>$niveauscolaires,'classes'=>$classes,'etablissements'=>$etablissements,
            'typedepaiements'=>$typedepaiements,'stations'=>$stations,'periodeabonnements'=>$periodeabonnements,

            'abonnementsociale'=>$abonnementsociale,'annees'=>$annees


        ]);
    }

    public function storeabonnementsociale(Request $request)
    {
        $request->validate(
            [   'nom'=>'bail|required|between:3,20|alpha',
                'prenom'=>'bail|required|between:3,20|alpha',
                'nomparent'=>'bail|required|between:3,20|alpha',
                'prenomparent'=>'bail|required|between:3,20|alpha',
                'cin' => 'required|numeric|digits:8',
                'datenaissance'=>'required|date',

                'adresse'=>'required',
                'telephone'=>'required|numeric|digits:8',
                'file'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'age'=>'required|numeric|digits:2',
                'numero'=>'required|numeric',
                'cartereference'=>'required|numeric',

                'periodeabonnement_id'=>'required',

                'ligne_id'=>'required',


                'region_id'=>'required',
                'municipalite_id'=>'required',


                'stationdebut'=>'bail|required|between:3,20|alpha',
                'stationfin'=>'bail|required|between:3,20|alpha',

                'prixtotale'=>'required',
                'etudiant_id'=>'required',
                'niveauscolaire_id'=>'required',
                'classe_id'=>'required',

                'typedepaiement_id'=>'required',
                'annee_id'=>'required',
                'station_id' =>'required',



            ]
        );


        $abonnementsociale = new Abonnementsociale();
        $abonnementsociale->nom = $request->nom;
        $abonnementsociale->prenom = $request->prenom;
        $abonnementsociale->nomparent = $request->nomparent;
        $abonnementsociale->prenomparent = $request->prenomparent;
        $abonnementsociale->cin = $request->cin;
        $abonnementsociale->datenaissance = $request->datenaissance;
        $abonnementsociale->prixtotale = $request->prixtotale;

        $abonnementsociale->stationdebut = $request->stationdebut;
        $abonnementsociale->stationfin = $request->stationfin;
        $abonnementsociale->age = $request->age;
        $abonnementsociale->numero = $request->numero;
        $abonnementsociale->cartereference = $request->cartereference;

        $abonnementsociale->periodeabonnement_id = $request->periodeabonnement_id;

        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        //$customer->image_path -> imageName;
        $abonnementsociale->profileimage = $imageName;
        $abonnementsociale->adresse = $request->adresse;
        $abonnementsociale->telephone = $request->telephone;
        $abonnementsociale->region_id = $request->region_id;
        $abonnementsociale->municipalite_id = $request->municipalite_id;
        $abonnementsociale->ligne_id = $request->ligne_id;

        $abonnementsociale->etudiant_id = $request->etudiant_id;
        $abonnementsociale->niveauscolaire_id = $request->level_id;
        $abonnementsociale->classe_id = $request->classe_id;
        $abonnementsociale->etablissement_id = $request->etablissement_id;
        $abonnementsociale->typedepaiement_id = $request->typedepaiement_id;
        $abonnementsociale->annee_id = $request-> annee_id;
        $abonnementsociale->station_id = $request->station_id;




        $abonnementsociale->save();



        return redirect()
            ->route('indexabonnementsociale')
            ->with('notice','abonnementsociale <strong>'. $abonnementsociale->nom. '</strong> a bien été ajouté');
    }


    public function updateabonnementsociale(Request $request) {

        $abonnementsociale = Abonnementsociale::find($request->id);

        $request->validate(

            [
                'nom'=>'bail|required|between:3,20|alpha',
                'prenom'=>'bail|required|between:3,20|alpha',
                'cin' => 'required|numeric|digits:8',

                'datenaissance'=>'required|date',
                'age'=>'required|numeric|digits:2',
                'numero'=>'required|numeric',
                'cartereference'=>'required|numeric',

                'file'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'periodeabonnement_id'=>'required',

                'typedepaiement_id'=>'required',
                'region_id'=>'required',
                'municipalite_id'=>'required',
                'ligne_id'=>'required',
                'station_id' =>'required',
                'annee_id'=>'required',


            ]
        );


        $abonnementsociale->nom = $request->nom;
        $abonnementsociale->prenom = $request->prenom;
        $abonnementsociale->nomparent = $request->nomparent;
        $abonnementsociale->prenomparent = $request->prenomparent;

        $abonnementsociale->datenaissance = $request->datenaissance;
        $abonnementsociale->age = $request->age;
        $abonnementsociale->numero = $request->numero;
        $abonnementsociale->cartereference = $request->cartereference;

        $abonnementsociale->cin = $request->cin;
        $abonnementsociale->annee_id = $request-> annee_id;
        $abonnementsociale->typedepaiement_id = $request->typedepaiement_id;


        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        //$customer->image_path -> imageName;
        $abonnementsociale->profileimage = $imageName;
        $abonnementsociale->adresse = $request->adresse;
        $abonnementsociale->telephone = $request->telephone;
        $abonnementsociale->region_id = $request->region_id;
        $abonnementsociale->municipalite_id = $request->municipalite_id;
        $abonnementsociale->ligne_id = $request->line_id;
        $abonnementsociale->station_id = $request->station_id;

        $abonnementsociale->periodeabonnement_id = $request->periodeabonnement_id;


        $abonnementsociale->save();
        return redirect()->route('indexabonnementsociale')->with('notice','abonnement sociale <strong>'. $abonnementsociale->nom. '</strong> a bien été modifié');

    }

    public function deleteabonnementsociale(Request $request) {

        $abonnementsociale = Abonnementsociale::find($request->id);
        $abonnementsociale->delete();
        return redirect()->route('indexabonnementsociale')
            ->with('notice','subscriptionsociale <strong>'.$abonnementsociale->nom. '</strong> a été supprimé');
    }

    public function abonnementsocialesearch(Request $request)
    {

        $data = Abonnementsociale::where('cin', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('abonnementsociales.search')->with([
            'abonnementsociales' => $data,
        ]);
    }

    public function sidebarabonnementsociale()
    {

        return view('abonnementsociales.sidebar');

    }




    public function showsociale(Request $request)
    {
        $abonnementsociale = Abonnementsociale::find($request->id);
        return view('abonnementsociales.showsociale',compact('abonnementsociale'));
    }

    public function getAllAbonnementsociale(){


        $abonnementsociales = Abonnementsociale::all();

        return view ('abonnementsociales',compact('abonnementsociales'));

    }

    public function downloadPDF2()
    {
        $abonnementsociales = Abonnementsociale::all();


        $pdf = PDF::loadView( 'abonnementsociales',compact('abonnementsociales'));

        return $pdf->download('abonnementsociale-list.pdf');
    }

// import Excel 2

    public function importFormAbonnementsociale()
    {
        return view ('abonnementsociales.import-form');
    }

// import Excel 3

    public function importabonnementsociale(Request $request ){

        Excel::import(new AbonnementsocialeImport,request()->file);
        return redirect('/indexabonnementsociale');
    }

}
