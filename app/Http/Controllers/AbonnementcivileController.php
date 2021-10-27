<?php

namespace App\Http\Controllers;

use App\Annee;
use App\Ligne;
use App\Municipalite;
use App\Periodeabonnement;
use App\Typedepaiement;
use App\Companie;
use App\Region;
use PDF;

use App\Imports\AbonnementcivileImport;
use Excel;


use DB;

use App\Station;

use App\Abonnementcivile;

use Illuminate\Http\Request;

class AbonnementcivileController extends Controller
{
    public function indexabonnementcivile()
    {

        $abonnementciviles = Abonnementcivile::latest()->paginate(5);
        $regions = Region::all();
        $companies = Companie::all();
        $typedepaiements = Typedepaiement::all();
        $periodeabonnements = Periodeabonnement::all();
        $lignes = Ligne::all();
        $municipalites = Municipalite::all();
        $annees = Annee::all();
        $stations = Station::all();

        return view('abonnementciviles.index',
            ['abonnementciviles'=>$abonnementciviles,'municipalites'=>$municipalites,
              'regions'=>$regions,  'typedepaiements'=>$typedepaiements,'lignes'=>$lignes,
              'companies'=>$companies,'annees'=>$annees,'periodeabonnements'>$periodeabonnements
                ,'stations'=>$stations

                ])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function indexabonnementcivileimport()
    {
        $abonnementciviles = Abonnementcivile::latest()->paginate(5);
        $regions = Region::all();
        $companies = Companie::all();
        $typedepaiements = Typedepaiement::all();
        $periodeabonnements = Periodeabonnement::all();
        $lignes = Ligne::all();
        $municipalites = Municipalite::all();
        $annees = Annee::all();
        $stations = Station::all();

        return view('abonnementciviles.indexabonnementcivileimport',
            ['abonnementciviles'=>$abonnementciviles,'municipalites'=>$municipalites,
                'regions'=>$regions,  'typedepaiements'=>$typedepaiements,'lignes'=>$lignes,
                'companies'=>$companies,'annees'=>$annees,'periodeabonnements'>$periodeabonnements
                ,'stations'=>$stations
            ])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function addabonnementcivile() {

        $abonnementciviles = Abonnementcivile::all();
        $regions = Region::all();
        $companies = Companie::all();
        $typedepaiements = Typedepaiement::all();
        $periodeabonnements = Periodeabonnement::all();
        $lignes = Ligne::all();
        $municipalites = Municipalite::all();
        $annees = Annee::all();
        $stations = Station::all();

        return view ('abonnementciviles.add',
            ['abonnementciviles'=>$abonnementciviles,'municipalites'=>$municipalites,
            'regions'=>$regions,  'typedepaiements'=>$typedepaiements,'lignes'=>$lignes,
            'companies'=>$companies,'periodeabonnements'=>$periodeabonnements,'annees'=>$annees
                ,'stations'=>$stations

            ]);
    }


    public function editabonnementcivile(Request $request){

        $abonnementciviles = Abonnementcivile::all();
        $regions = Region::all();
        $companies = Companie::all();
        $typedepaiements = Typedepaiement::all();
        $lignes = Ligne::all();
        $municipalites = Municipalite::all();
        $periodeabonnements = Periodeabonnement::all();
        $annees = Annee::all();
        $abonnementcivile = Abonnementcivile::find($request->id);
        $stations = Station::all();


        return view ('abonnementciviles.edit',[
            'abonnementciviles'=>$abonnementciviles,'municipalites'=>$municipalites,
            'regions'=>$regions,  'typedepaiements'=>$typedepaiements,'lignes'=>$lignes
           ,'abonnementcivile'=>$abonnementcivile,'companies'=>$companies,
           'periodeabonnements'=>$periodeabonnements,'annees'=>$annees
            ,'stations'=>$stations
        ]);
    }

    public function storeabonnementcivile(Request $request)
    {
        $request->validate(
            [   'nom'=>'bail|required|between:3,20|alpha',
                'prenom'=>'bail|required|between:3,20|alpha',
                'cin'=>'required|numeric',
                'datenaissance'=>'required|date',

                'stationdebut'=>'bail|required|between:3,20|alpha',
                'stationfin'=>'bail|required|between:3,20|alpha',
                'adresse'=>'required',
                'telephone'=>'required|numeric|digits:8',
                'prixtotale'=>'required|regex:/^\d+(\.\d{1,4})?$/',
                'numero'=>'required|numeric',
                'cartereference'=>'required|numeric',
                'file'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'region_id'=>'required',
                'companie_id' =>'required',
                'typedepaiement_id'=>'required',
                'periodeabonnement_id'=>'required',
                'ligne_id'=>'required',
                'municipalite_id'=>'required',
                'annee_id'=>'required',
                 'station_id' =>'required',


            ]
        );


        $abonnementcivile = new Abonnementcivile();
        $abonnementcivile->nom = $request->nom;
        $abonnementcivile->prenom = $request->prenom;
        $abonnementcivile->cin = $request->cin;
        $abonnementcivile->datenaissance = $request->datenaissance;
        $abonnementcivile->stationdebut = $request->stationdebut;
        $abonnementcivile->stationfin = $request->stationfin;

        $abonnementcivile->adresse = $request->adresse;
        $abonnementcivile->telephone = $request->telephone;
        $abonnementcivile->prixtotale = $request->prixtotale;
        $abonnementcivile->numero = $request->numero;
        $abonnementcivile->cartereference = $request->cartereference;

        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        //$customer->image_path -> imageName;
        $abonnementcivile->profileimage = $imageName;
        $abonnementcivile->region_id = $request->region_id;
        $abonnementcivile->municipalite_id = $request->municipalite_id;
        $abonnementcivile->typedepaiement_id = $request->typedepaiement_id;
        $abonnementcivile->companie_id = $request->companie_id;
        $abonnementcivile->ligne_id = $request->ligne_id;
        $abonnementcivile-> periodeabonnement_id = $request-> periodeabonnement_id;
        $abonnementcivile->  annee_id = $request->  annee_id;
        $abonnementcivile->station_id = $request->station_id;


        $abonnementcivile->save();



        return redirect()
            ->route('indexabonnementcivile')
            ->with('notice','subscription civile <strong>'. $abonnementcivile->nom. '</strong> a bien été ajouté');
    }

    public function updateabonnementcivile(Request $request) {

        $abonnementcivile = Abonnementcivile::find($request->id);

        $request->validate(

              [ 'nom'=>'bail|required|between:3,20|alpha',
                'prenom'=>'bail|required|between:3,20|alpha',
                'cin'=>'required|numeric',
                'datenaissance'=>'required|date',

                'stationdebut'=>'bail|required|between:3,20|alpha',
                'stationfin'=>'bail|required|between:3,20|alpha',
                'adresse'=>'required',
                'telephone'=>'required|numeric|digits:8',
                'prixtotale'=>'required|regex:/^\d+(\.\d{1,4})?$/',
                'numero'=>'required|numeric',
                'cartereference'=>'required|numeric',
                'file'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'region_id'=>'required',
                'companie_id' =>'required',
                'typedepaiement_id'=>'required',
                'periodeabonnement_id'=>'required',
                'ligne_id'=>'required',
                'municipalite_id'=>'required',
                'annee_id'=>'required',
                 'station_id' =>'required',


            ]
        );



        $abonnementcivile = new Abonnementcivile();
        $abonnementcivile->nom = $request->nom;
        $abonnementcivile->prenom = $request->prenom;
        $abonnementcivile->cin = $request->cin;
        $abonnementcivile->datenaissance = $request->datenaissance;

        $abonnementcivile->stationdebut = $request->stationdebut;
        $abonnementcivile->stationfin = $request->stationfin;

        $abonnementcivile->adresse = $request->adresse;
        $abonnementcivile->telephone = $request->telephone;
        $abonnementcivile->prixtotale = $request->prixtotale;
        $abonnementcivile->numero = $request->numero;
        $abonnementcivile->cartereference = $request->cartereference;

        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        //$customer->image_path -> imageName;
        $abonnementcivile->profileimage = $imageName;
        $abonnementcivile->region_id = $request->region_id;
        $abonnementcivile->municipalite_id = $request->municipalite_id;
        $abonnementcivile->typedepaiement_id = $request->typedepaiement_id;
        $abonnementcivile->companie_id = $request->companie_id;
        $abonnementcivile->ligne_id = $request->ligne_id;
        $abonnementcivile-> periodeabonnement_id = $request-> periodeabonnement_id;
        $abonnementcivile->  annee_id = $request->  annee_id;
        $abonnementcivile->station_id = $request->station_id;


        $abonnementcivile->save();



        return redirect()->route('indexabonnementcivile')->with('notice','abonnementcivile <strong>'. $abonnementcivile->nom. '</strong> a bien été modifié');

    }

    public function deleteabonnementcivile(Request $request) {

        $abonnementcivile = Abonnementcivile::find($request->id);
        $abonnementcivile->delete();
        return redirect()->route('indexabonnementcivile')
            ->with('notice','abonnementcivile <strong>'.$abonnementcivile->nom. '</strong> a été supprimé');
    }

    public function abonnementcivilesearch(Request $request)
    {

        $data = Abonnementcivile::where('cin', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('abonnementciviles.search')->with([
            'abonnementciviles' => $data,
        ]);
    }

    public function sidebarabonnementcivile()
    {

        return view('abonnementciviles.sidebar');

    }

    public function getAllAbonnementcivile(){


        $abonnementciviles = Abonnementcivile::all();

        return view ('abonnementciviles',compact('abonnementciviles'));

    }

    public function downloadPDF1()
    {
        $abonnementciviles = Abonnementcivile::all();


        $pdf = PDF::loadView( 'abonnementciviles',compact('abonnementciviles'));

        return $pdf->download('abonnementcivile-list.pdf');
    }


    public function showcivile(Request $request)
    {
        $abonnementcivile = Abonnementcivile::find($request->id);
        return view(' abonnementciviles.showcivile',compact('abonnementcivile'));
    }

    public function importFormAbonnementcivile()
    {
        return view ('abonnementciviles.import-form');
    }

    public function importAbonnementcivile(Request $request ){

        Excel::import(new AbonnementcivileImport,request()->file);
        return redirect('/indexabonnementcivile');
    }

}
