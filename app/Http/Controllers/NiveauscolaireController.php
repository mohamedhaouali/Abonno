<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Niveauscolaire;

class NiveauscolaireController extends Controller
{


    public function indexniveauscolaire()
    {

        $niveauscolaires = Niveauscolaire::latest()->paginate(5);

        return view('niveauscolaires.index',
            ['niveauscolaires'=>$niveauscolaires])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function addniveauscolaire () {

        $niveauscolaires = Niveauscolaire::all();


        return view ('niveauscolaires.add',['niveauscolaires'=>$niveauscolaires

        ]);
    }

    public function editniveauscolaire(Request $request){

        $niveauscolaires = Niveauscolaire::all();

        $niveauscolaire = Niveauscolaire::find($request->id);


        return view ('niveauscolaires.edit',[
            'niveauscolaires'=>$niveauscolaires,
            'niveauscolaire'=>$niveauscolaire,

        ]);
    }

    public function storeniveauscolaire(Request $request)
    {
        $request->validate(
            [
                'nom_fr' => 'required|unique:niveauscolaires|max:255',
                'nom_ar'=>'required|unique:niveauscolaires|max:255',
            ]
        );


        $niveauscolaire = new Niveauscolaire();
        $niveauscolaire->nom_fr = $request->nom_fr;
        $niveauscolaire->nom_ar = $request->nom_ar;

        $niveauscolaire->save();



        return redirect()
            ->route('indexniveauscolaire')
            ->with('notice','niveauscolaire <strong>'. $niveauscolaire->name_ar. '</strong> a bien été ajouté');
    }

    public function updateniveauscolaire(Request $request) {

        $niveauscolaire = Niveauscolaire::find($request->id);

        $request->validate(
               [    'nom_fr' => 'required|unique:niveauscolaires|max:255',
                   'nom_ar'=>'required|unique:niveauscolaires|max:255',


            ]
        );


        $niveauscolaire->nom_fr = $request->nom_fr;
        $niveauscolaire->nom_ar = $request->nom_ar;

        $niveauscolaire->save();


        return redirect()->route('indexniveauscolaire')->with('notice','niveauscolaire <strong>'. $niveauscolaire->nom_ar. '</strong> a bien été modifié');

    }

    public function deleteniveauscolaire(Request $request) {

        $niveauscolaire = Niveauscolaire::find($request->id);
        $niveauscolaire->delete();
        return redirect()->route('indexniveauscolaire')
            ->with('notice','Le Niveaux scolaire <strong>'.$niveauscolaire->nom_ar. '</strong> a été supprimé');
    }
}
