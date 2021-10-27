<?php

namespace App\Http\Controllers;

use App\Typesetablissement;
use Illuminate\Http\Request;

class TypesetablissementController extends Controller
{

    public function indextypesetablissement()
    {
        $typesetablissements = Typesetablissement::latest()->paginate(5);

        return view('typesetablissements.index', compact('typesetablissements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function addtypesetablissement () {

        $typesetablissements = Typesetablissement::all();

        return view ('typesetablissements.add',['typesetablissements'=>$typesetablissements

        ]);
    }

    public function storetypesetablissement(Request $request)
    {
        $request->validate(
            [   'nom_fr'=>'bail|required|between:3,20',
                'nom_ar'=>'bail|required|between:3,20',


            ]
        );

        $typesetablissement = new Typesetablissement();
        $typesetablissement->nom_fr = $request->nom_fr;
        $typesetablissement->nom_ar = $request->nom_ar;

        $typesetablissement->save();

        return redirect()
            ->route('indextypesetablissement')
            ->with('notice','typesetablissement <strong>'. $typesetablissement->nom_fr. '</strong> a bien été ajouté');
    }


    public function edittypesetablissement(Request $request){
        $typesetablissements = Typesetablissement::all();


        $typesetablissement = Typesetablissement::find($request->id);


        return view ('typesetablissements.edit',[
            'typesetablissements'=>$typesetablissements,
            'typesetablissement'=>$typesetablissement,

        ]);
    }

    public function updatetypesetablissement(Request $request) {

        $typesetablissement = Typesetablissement::find($request->id);

        $request->validate(
            ['nom_fr'=>'required',
             'nom_ar'=>'required',
            ]
        );


        $typesetablissement->nom_fr = $request->nom_fr;
        $typesetablissement->nom_ar = $request->nom_ar;


        $typesetablissement->save();


        return redirect()->route('indextypesetablissement')->with('notice','typesetablissement <strong>'. $typesetablissement->nom_fr. '</strong> a bien été modifié');

    }

    public function deletetypesetablissement(Request $request) {

        $typesetablissement = Typesetablissement::find($request->id);
        $typesetablissement->delete();
        return redirect()->route('indextypesetablissement')
            ->with('notice','typesetablissement <strong>'.$typesetablissement->nom_fr. '</strong> a été supprimé');
    }




}
