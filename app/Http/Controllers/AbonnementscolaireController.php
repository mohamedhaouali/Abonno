<?php

namespace App\Http\Controllers;

use App\Agence;
use App\Annee;
use App\Card;
use App\Classe;
use App\Customer;

use App\Etablissement;
use App\Etudiant;
use App\Level;
use App\Ligne;
use App\Municipalite;
use App\Niveauscolaire;
use App\Periodeabonnement;
use App\Region;
use App\Abonnementscolaire;
use App\Subscriptiontype;
use App\Typedepaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Station;
use App\Imports\AbonnementscolaireImport;
use Excel;
use DB;


class AbonnementscolaireController extends Controller
{
    //proteger les functions ou personnes connectes

    function __construct() {

        $this->middleware('auth');
    }

    public function indexabonnementscolaire()
    {

        $abonnementscolaires = Abonnementscolaire::latest()->paginate(5);
        $etudiants = Etudiant::all();
        $regions = Region::all();
        $niveauscolaires = Niveauscolaire::all();
        $classes = Classe::all();
        $etablissements = Etablissement::all();
        $periodeabonnements = Periodeabonnement::all();
        $typedepaiements = Typedepaiement::all();
        $lignes = Ligne::all();
        $municipalites = Municipalite::all();
        $classes = Classe::all();
        $annees = Annee::all();
        $stations = Station::all();



        return view('abonnementscolaires.index',
            ['abonnementscolaires'=>$abonnementscolaires,'municipalites'=>$municipalites,
                'etudiants'=>$etudiants,'regions'=>$regions,'niveauscolaires'=>$niveauscolaires,
                'classes'=>$classes,'etablissement'=>$etablissements,
                'typedepaiements'=>$typedepaiements,'lignes'=>$lignes,
                'periodeabonnements'=>$periodeabonnements,'classes'=>$classes,'annees'=>$annees
                ,'stations'=>$stations
            ])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function indexabonnementscolaireimport()
    {
        $abonnementscolaires = Abonnementscolaire::latest()->paginate(5);
        $etudiants = Etudiant::all();
        $regions = Region::all();
        $niveauscolaires = Niveauscolaire::all();
        $classes = Classe::all();
        $etablissements = Etablissement::all();
        $periodeabonnements = Periodeabonnement::all();
        $typedepaiements = Typedepaiement::all();
        $lignes = Ligne::all();
        $municipalites = Municipalite::all();
        $classes = Classe::all();
        $annees = Annee::all();
        $stations = Station::all();


        return view('abonnementscolaires.indexabonnementscolaireimport',
            ['abonnementscolaires'=>$abonnementscolaires,'municipalites'=>$municipalites,
                'etudiants'=>$etudiants,'regions'=>$regions,'niveauscolaires'=>$niveauscolaires,
                'classes'=>$classes,'etablissement'=>$etablissements,
                'typedepaiements'=>$typedepaiements,'lignes'=>$lignes,
                'periodeabonnements'=>$periodeabonnements,'classes'=>$classes,'annees'=>$annees
                ,'stations'=>$stations
            ])
            ->with('i', (request()->input('page', 1) - 1) * 5);



    }

    public function sidebarabonnementscolaire()
    {

        return view('abonnementscolaires.sidebar');

    }


    public function addabonnementscolaire () {

        $abonnementscolaires = Abonnementscolaire::latest()->paginate(5);
        $etudiants = Etudiant::all();
        $regions = Region::all();
        $niveauscolaires = Niveauscolaire::all();
        $classes = Classe::all();
        $etablissements = Etablissement::all();
        $periodeabonnements = Periodeabonnement::all();
        $typedepaiements = Typedepaiement::all();
        $lignes = Ligne::all();
        $municipalites = Municipalite::all();
        $classes = Classe::all();
        $annees = Annee::all();
        $stations = Station::all();



        return view ('abonnementscolaires.add',
            ['abonnementscolaires'=>$abonnementscolaires,'municipalites'=>$municipalites,
                'etudiants'=>$etudiants,'regions'=>$regions,'niveauscolaires'=>$niveauscolaires,
                'classes'=>$classes,'etablissements'=>$etablissements,
                'typedepaiements'=>$typedepaiements,'lignes'=>$lignes,
                'periodeabonnements'=>$periodeabonnements,'classes' =>$classes,'annees'=>$annees
                ,'stations'=>$stations

            ]);


    }

    public function editabonnementscolaire(Request $request){

        $abonnementscolaires = Abonnementscolaire::latest()->paginate(5);
        $etudiants = Etudiant::all();
        $regions = Region::all();
        $niveauscolaires = Niveauscolaire::all();
        $classes = Classe::all();
        $etablissements = Etablissement::all();
        $periodeabonnements = Periodeabonnement::all();
        $typedepaiements = Typedepaiement::all();
        $lignes = Ligne::all();
        $municipalites = Municipalite::all();
        $classes = Classe::all();
        $annees = Annee::all();
        $stations = Station::all();


        $abonnementscolaire = Abonnementscolaire::find($request->id);


        return view ('abonnementscolaires.edit',[
            'abonnementscolaires'=>$abonnementscolaires,'municipalites'=>$municipalites,
            'etudiants'=>$etudiants,'regions'=>$regions,'niveauscolaires'=>$niveauscolaires,
            'classes'=>$classes,'etablissements'=>$etablissements,
            'typedepaiements'=>$typedepaiements,'lignes'=>$lignes,
            'abonnementscolaire'=>$abonnementscolaire,
            'periodeabonnements'=>$periodeabonnements,'classes'=>$classes,'annees'=>$annees
            ,'stations'=>$stations

        ]);
    }
    public function storeabonnementscolaire(Request $request)
    {
        $user=Auth::user();
        $request->validate(
            [   'nom'=>'required',
                'prenomabonne'=>'required',
                'nomparent'=>'required',
                'age'=>'required|numeric|digits:2',
                'prenomparent'=>'required',
                'datenaissance'=>'required|date',
                'adresse'=>'required',
                'telephone'=>'required|numeric|digits:8',
                'prixtotale'=>'required|regex:/^\d+(\.\d{1,4})?$/',
                'file'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'numero'=>'required|numeric',
                'cartereference'=>'required|numeric',

                'region_id'=>'required',
                'periodeabonnement_id'=>'required',
                'typedepaiement_id'=>'required',
                'ligne_id'=>'required',
                'municipalite_id'=>'required',

                'annee_id' =>'required',
                'stationdebut'=>'bail|required|between:3,20|alpha',
                'stationfin'=>'bail|required|between:3,20|alpha',
                'station_id' =>'required',


            ]
        );

        if($request->abonnementscolaire) {
            $abonnementscolaire=Abonnementscolaire::find($request->abonnementscolaire);
        }
        else{
            $abonnementscolaire=new Abonnementscolaire;
        }



        $abonnementscolaire = new Abonnementscolaire();
        $abonnementscolaire->nom = $request->nom;
        $abonnementscolaire->prenomabonne = $request->prenomabonne;
        $abonnementscolaire->nomparent = $request->nomparent;
        $abonnementscolaire->prenomparent = $request->prenomparent;
        $abonnementscolaire->age = $request->age;
        $abonnementscolaire->datenaissance = $request->datenaissance;
        $abonnementscolaire->stationdebut = $request->stationdebut;
        $abonnementscolaire->stationfin = $request->stationfin;

        $abonnementscolaire->adresse = $request->adresse;
        $abonnementscolaire->telephone = $request->telephone;
        $abonnementscolaire->prixtotale = $request->prixtotale;
        $abonnementscolaire->numero = $request->numero;


        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        //$customer->image_path -> imageName;
        $abonnementscolaire->profileimage = $imageName;

        $abonnementscolaire->cartereference = $request->cartereference;
        $abonnementscolaire->etudiant_id = $request->etudiant_id;
        $abonnementscolaire->region_id = $request->region_id;
        $abonnementscolaire->municipalite_id = $request->municipalite_id;
        $abonnementscolaire->niveauscolaire_id = $request->niveauscolaire_id;
        $abonnementscolaire->etablissement_id = $request->etablissement_id;
        $abonnementscolaire->periodeabonnement_id = $request->periodeabonnement_id;
        $abonnementscolaire->typedepaiement_id = $request->typedepaiement_id;
        $abonnementscolaire->ligne_id = $request->ligne_id;
        $abonnementscolaire->classe_id = $request->classe_id;
        $abonnementscolaire->annee_id = $request-> annee_id;
        $abonnementscolaire->station_id = $request->station_id;


        $abonnementscolaire->save();



        return redirect()
            ->route('indexabonnementscolaire')
            ->with('notice','subscription <strong>'. $abonnementscolaire->nom. '</strong> a bien été ajouté');
    }

    public function updateabonnementscolaire(Request $request) {

        $abonnementscolaire = Abonnementscolaire::find($request->id);

        $request->validate(

            [
                'nom'=>'required',
                'prenomabonne'=>'required',
                'nomparent'=>'required',
                'prenomparent'=>'required',
                'age'=>'required|numeric|digits:2',
                'datenaissance'=>'required',
                'adresse'=>'required',
                'telephone'=>'required|numeric|digits:8',
                'prixtotale'=>'required|regex:/^\d+(\.\d{1,4})?$/',
                'file'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'numero'=>'required|numeric',
                'cartereference'=>'required|numeric',

                'region_id'=>'required',

                'periodeabonnement_id'=>'required',
                'typedepaiement_id'=>'required',
                'ligne_id'=>'required',
                'municipalite_id'=>'required',

                'annee_id' =>'required',
                'stationdebut'=>'bail|required|between:3,20|alpha',
                'stationfin'=>'bail|required|between:3,20|alpha',
                'station_id' =>'required',



            ]
        );

        $abonnementscolaire->nom = $request->nom;
        $abonnementscolaire->prenomabonne = $request->prenomabonne;
        $abonnementscolaire->nomparent = $request->nomparent;
        $abonnementscolaire->prenomparent = $request->prenomparent;
        $abonnementscolaire->datenaissance = $request->datenaissance;
        $abonnementscolaire->stationdebut = $request->stationdebut;
        $abonnementscolaire->stationfin = $request->stationfin;
        $abonnementscolaire->age = $request->age;
        $abonnementscolaire->adresse = $request->adresse;
        $abonnementscolaire->telephone = $request->telephone;
        $abonnementscolaire->prixtotale = $request->prixtotale;
        $abonnementscolaire->numero = $request->numero;



        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        //$customer->image_path -> imageName;
        $abonnementscolaire->profileimage = $imageName;



        $abonnementscolaire->cartereference = $request->cartereference;
        $abonnementscolaire->etudiant_id = $request->etudiant_id;
        $abonnementscolaire->region_id = $request->region_id;
        $abonnementscolaire->municipalite_id = $request->municipalite_id;
        $abonnementscolaire->niveauscolaire_id = $request->niveauscolaire_id;
        $abonnementscolaire->etablissement_id = $request->etablissement_id;
        $abonnementscolaire->periodeabonnement_id = $request->periodeabonnement_id;
        $abonnementscolaire->typedepaiement_id = $request->typedepaiement_id;
        $abonnementscolaire->ligne_id = $request->ligne_id;
        $abonnementscolaire->classe_id = $request->classe_id;
        $abonnementscolaire->annee_id = $request-> annee_id;
        $abonnementscolaire->station_id = $request->station_id;

        $abonnementscolaire->save();




        return redirect()->route('indexabonnementscolaire')->with('notice','abonnement scolaire <strong>'. $abonnementscolaire->nom. '</strong> a bien été modifié');

    }

    public function deleteabonnementscolaire(Request $request) {

        $abonnementscolaire = Abonnementscolaire::find($request->id);
        $abonnementscolaire->delete();
        return redirect()->route('indexabonnementscolaire')
            ->with('notice','abonnementscolaire <strong>'.$abonnementscolaire->nom. '</strong> a été supprimé');
    }


    public function abonnementscolairesearch(Request $request)
    {

        $data = Abonnementscolaire::where('nom', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('abonnementscolaires.search')->with([
            'abonnementscolaires' => $data,
        ]);
    }

    public function getAllAbonnementscolaire(){

        $abonnementscolaires  = Abonnementscolaire::all();

        return view ('abonnementscolaires',compact('abonnementscolaires'));

    }

    public function getAbonnementscolaire($id){

        Abonnementscolaires::where('etudiant_id','=',$id)->get();

    }

    public function downloadPDF()
    {
        $abonnementscolaires  = Abonnementscolaire::all();

        $pdf = PDF::loadView( 'abonnementscolaires',compact('abonnementscolaires'));

        return $pdf->download('abonnementscolaires-list.pdf');
    }





    public function showabonnementscolaire(Request $request)
    {
        $abonnementscolaire = Abonnementscolaire::find($request->id);
        return view('abonnementscolaires.show',compact('abonnementscolaire'));
    }

    public function pdfexport($id)
    {
        $abonnementscolaire = Abonnementscolaire::find($id);

        $pdf = PDF::loadView( 'abonnementscolaires.pdf',['abonnementscolaire'=>$abonnementscolaire]
        )->setPaper('a4','portrait');

        $fileName = $abonnementscolaire->nom;
        return $pdf->stream($fileName. '.pdf');
    }

    public function importFormAbonnementscolaire()
    {
        return view ('abonnementscolaires.import-form');
    }

    public function importAbonnementscolaire(Request $request ){

        Excel::import(new AbonnementscolaireImport,request()->file);
        return redirect('/indexabonnementscolaire');
    }

    public function findProductName(Request $request){


        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data=Abonnementscolaire::select('nom','id')->where('region_id',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
    }


    public function findPrice(Request $request){

        //it will get price if its id match with product id
        $p=Product::select('price')->where('id',$request->id)->first();

        return response()->json($p);
    }


    public function index()
    {
        $abonnementscolaires = DB::table("abonnementscolaires")->pluck("nom","id");
        return view('dropdown',compact('abonnementscolaires'));
    }

    public function getregion(Request $request)
    {
        $regions = DB::table("regions")

            ->where("abonnementscolaire_id",$request->region_id)
            ->pluck("nom_fr","id");
        return response()->json($regions);
    }

    public function getMunicipalité(Request $request)
    {

        $municipalites = DB::table("municipalites")
            ->where("region_id",$request->abonnementscolaire_id)
            ->pluck("nom_fr","id");
        return response()->json($municipalites);
    }

    public function verifage(Request $request)
    {
        $today = new DateTime('today');
        $sdate = $request->datenaissance;
        $date = new DateTime($sdate);
        $age=Setting::first()->age;
        if (intval($today->diff($date)->format('%Y')) < intval($age) && intval($today->diff($date)->format('%Y')) >0) {
            return response()->json(['is_valid' => 1]);
        } else {
            return response()->json(['is_valid' => false]);
        }
    }
}
