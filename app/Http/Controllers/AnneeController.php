<?php

namespace App\Http\Controllers;

use App\Annee;
use Illuminate\Http\Request;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexannee()
    {
        $annees = Annee::latest()->paginate(5);

        return view('annees.index',
            ['annees'=>$annees])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addannee () {

        $annees = Annee::all();


        return view ('annees.add',['annees'=>$annees

        ]);
    }

    public function editannee(Request $request){

        $annees = Annee::all();

        $annee = Annee::find($request->id);


        return view ('annees.edit',[
            'annees'=>$annees,
            'annee'=>$annee,

        ]);
    }

    public function storeannee(Request $request)
    {
        $request->validate(
            [   'nom'=>'required',

            ]
        );


        $annee = new Annee();
        $annee->nom = $request->nom;


        $annee->save();

        return redirect()
            ->route('indexannee')
            ->with('notice','Annee <strong>'. $annee->nom. '</strong> a bien été ajouté');
    }

    public function updateannee(Request $request) {

        $annee = Annee::find($request->id);

        $request->validate(
            [ 'nom'=>'required',

            ]
        );


        $annee->nom = $request->nom;

        $annee->save();


        return redirect()->route('indexannee')->with('notice','annee <strong>'. $annee->nom. '</strong> a bien été modifié');

    }

    public function deleteannee(Request $request) {

        $annee = Annee::find($request->id);
        $annee->delete();
        return redirect()->route('indexannee')
            ->with('notice','Le Bus <strong>'.$annee->nom. '</strong> a été supprimé');
    }



}
