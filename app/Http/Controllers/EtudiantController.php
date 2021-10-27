<?php

namespace App\Http\Controllers;

use App\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function indexetudiant()
    {

        $etudiants = Etudiant::latest()->paginate(5);

        return view('etudiants.index',
            ['etudiants'=>$etudiants])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function addetudiant () {

        $etudiants = Etudiant::all();


        return view ('etudiants.add',['etudiants'=>$etudiants

        ]);
    }


    public function editetudiant(Request $request){

        $etudiants = Etudiant::all();

        $etudiant = Etudiant::find($request->id);


        return view ('etudiants.edit',[
            'etudiants'=>$etudiants,
            'etudiant'=>$etudiant,

        ]);
    }

    public function storeetudiant(Request $request)
    {
        $request->validate(
            [  'nom'=>'required',

            ]
        );


        $etudiant = new Etudiant();
        $etudiant->nom= $request->nom;


        $etudiant->save();



        return redirect()
            ->route('indexetudiant')
            ->with('notice','Etudiant <strong>'. $etudiant->nom. '</strong> a bien été ajouté');
    }


    public function updateetudiant(Request $request) {



        $etudiant = Etudiant::find($request->id);

        $request->validate(
            [   'nom'=>'required',


            ]
        );


        $etudiant->nom = $request->nom;


        $etudiant->save();


        return redirect()->route('indexetudiant')->with('notice','Etudiant <strong>'. $etudiant->nom. '</strong> a bien été modifié');

    }

    public function deleteetudiant(Request $request) {

        $etudiant = Etudiant::find($request->id);

        $etudiant->delete();
        return redirect()->route('indexetudiant')
            ->with('notice','Etudiant <strong>'.$etudiant->nom. '</strong> a été supprimé');
    }

}
