<?php

namespace App\Http\Controllers;


use App\Classe;
use App\Ligne;
use App\Social;
use Illuminate\Http\Request;
use App\Exports\SocialExport;
use App\Imports\SocialImport;
use Excel;
use Validator;

class SocialController extends Controller
{
    public function indexsocial()
    {
        $socials = Social::latest()->paginate(5);
        $lignes = Ligne::all();
        $classes = Classe::all();

        return view('socials.index',
            ['socials'=>$socials, 'classes' => $classes,'lignes' => $lignes])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function index1social()
    {
        $socials = Social::latest()->paginate(5);
        $lignes = Ligne::all();
        $classes =Classe::all();

        return view('socials.index1',
            ['socials'=>$socials, 'classes' => $classes,'lignes' => $lignes])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }




    public function indexsocialimport()
    {
        $socials = Social::latest()->paginate(5);
        $lignes = Ligne::all();
        $classes =Classe::all();

        return view('socials.indexsocialimport',
            ['socials'=>$socials, 'classes' => $classes,'lignes' => $lignes])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function addsocial () {

        $socials = Social::all();
        $lignes = Ligne::all();
        $classes =Classe::all();
        //var_dump("hi");
        return view ('socials.add',['socials'=>$socials
            , 'classes' => $classes,'lignes' => $lignes
        ]);
    }




    public function editsocial(Request $request){

        $socials = Social::all();

        $social = Social::find($request->id);

        $lignes = Ligne::all();
        $classes =Classe::all();


        return view ('socials.edit',[
            'socials'=>$socials,
            'social'=>$social,
            'classes' => $classes,
            'lignes' => $lignes

        ]);
    }
    public function storesocial(Request $request)
    {
        $request->validate(
            [   'nomparent'=>'required|between:3,20',
                'prenomparent'=>'required|between:3,20',
                'nomabonne'=>'required|between:3,20',
                'prenomabonne'=>'required|between:3,20',
                'cin'=>'required|numeric|digits:8',
                'nombrenfants'=>'required',
                'nomenfant1'=>'required',
                'ligne_id'=> 'required',
                'classe_id'=> 'required',



            ]
        );
        //var_dump($request->nomenfant1);

        // var_dump($request->nomenfant2);
        $social = new Social();
        $social->nomparent = $request->nomparent;
        $social->prenomparent = $request->prenomparent;
        $social->nomabonne = $request->nomabonne;
        $social->prenomabonne = $request->prenomabonne;
        $social->cin = $request->cin;
        $social->nombrenfants = $request->nombrenfants;
        $social->nomenfant1 = $request->nomenfant1;
        $social->nomenfant2 = $request->nomenfant2;
        $social->nomenfant3 = $request->nomenfant3;
        $social->nomenfant4 = $request->nomenfant4;
        $social->nomenfant5 = $request->nomenfant5;
        $social->nomenfant6 = $request->nomenfant6;
        $social->nomenfant7 = $request->nomenfant7;
        $social->ligne_id = $request->ligne_id;

        $social->classe_id = $request->classe_id;
        $social->save();



        return redirect()
            ->route('index1social')
            ->with('notice','social <strong>'. $social->nomabonne. '</strong> a bien été ajouté');
    }

    public function updatesocial(Request $request) {


        $social = Social::find($request->id);

        $request->validate(
            [  'nomparent'=>'required|between:3,20',
                'prenomparent'=>'required|between:3,20',
                'nomabonne'=>'required|between:3,20',
                'prenomabonne'=>'required|between:3,20',
                'cin'=>'required|numeric|digits:8',
                'nombrenfants'=>'required',
                'nomenfant1'=>'required',
                'ligne_id'=> 'required',
                'classe_id'=> 'required',
            ]
        );


        $social->nomparent = $request->nomparent;
        $social->prenomparent = $request->prenomparent;
        $social->nomabonne = $request->nomabonne;
        $social->prenomabonne = $request->prenomabonne;
        $social->cin = $request->cin;
        $social->nombrenfants = $request->nombrenfants;
        $social->nomenfant1 = $request->nomenfant1;
        $social->nomenfant2 = $request->nomenfant2;
        $social->nomenfant3 = $request->nomenfant3;
        $social->nomenfant4 = $request->nomenfant4;
        $social->nomenfant5 = $request->nomenfant5;
        $social->nomenfant6 = $request->nomenfant6;
        $social->nomenfant7 = $request->nomenfant7;

        $social->ligne_id = $request->ligne_id;

        $social->classe_id = $request->classe_id;

        $social->save();


        return redirect()->route('index1social')->with('notice','social <strong>'. $social->nomabonne. '</strong> a bien été modifié');

    }


    public function deletesocial(Request $request) {

        $social = Social::find($request->id);
        $social->delete();
        return redirect()->route('indexsocial')
            ->with('notice','social <strong>'.$social->nomabonne. '</strong> a été supprimé');
    }

    public function importForm()
    {
        return view ('importForm');
    }

    public function import(Request $request ){

        Excel::import(new SocialImport,request()->file);
        return redirect('/indexsocial');
    }

    public function socialsearch(Request $request)
    {

        $data = Social::where('cin', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('socials.search')->with([
            'socials' => $data,
        ]);
    }

    public function sumbitData(Request $request) {

        foreach($request->nom
                as $key=>$nom){
            $data = new Social();
            $data->nom =$nom;
            $data->prenom = $request->prenom[$key];
            $data->cin  = $request->cin[$key];
            $data->nomenfant1  = $request->nomenfant1[$key];


            $data->save();
        }

        return redirect()->route('index1social');
    }

    public function importFormSocial()
    {
        return view ('socials.import-form');
    }

    public function importSocial(Request $request ){

        Excel::import(new SocialImport,request()->file);
        return redirect('/index1social');
    }

}
