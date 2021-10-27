<?php

namespace App\Http\Controllers;

use App\Typedepaiement;
use Illuminate\Http\Request;

class TypedepaiementController extends Controller
{

    public function indextypedepaiement()
    {

        $typedepaiements = Typedepaiement::latest()->paginate(5);

        return view('typedepaiements.index',
            ['typedepaiements'=>$typedepaiements])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function addtypedepaiement() {

        $typedepaiements = Typedepaiement::all();


        return view ('typedepaiements.add',['typedepaiements'=>$typedepaiements

        ]);
    }

    public function edittypedepaiement(Request $request){

        $typedepaiements = Typedepaiement::all();

        $typedepaiement = Typedepaiement::find($request->id);


        return view ('typedepaiements.edit',[
            'typedepaiements'=>$typedepaiements,
            'typedepaiement'=>$typedepaiement

        ]);
    }



    public function storetypedepaiement(Request $request)
    {
        $request->validate(
            [   'nom_fr'=>'required',
                'nom_ar'=>'required',

            ]
        );


        $typedepaiement = new Typedepaiement();
        $typedepaiement->nom_fr = $request->nom_fr;
        $typedepaiement->nom_ar = $request->nom_ar;


        $typedepaiement->save();



        return redirect()
            ->route('indextypedepaiement')
            ->with('notice','typedepaiement <strong>'. $typedepaiement->nom_fr. '</strong> a bien été ajouté');
    }

    public function updatetypedepaiement(Request $request) {

        $typedepaiement = Typedepaiement::find($request->id);

        $request->validate(
            ['nom_fr'=>'required',
             'nom_ar'=>'required',

            ]
        );


        $typedepaiement->nom_fr = $request->nom_fr;
        $typedepaiement->nom_ar = $request->nom_ar;


        $typedepaiement->save();


        return redirect()->route('indextypedepaiement')->with('notice','typedepaiement <strong>'. $typedepaiement->nom_fr. '</strong> a bien été modifié');

    }

    public function deletetypedepaiement(Request $request) {

        $typedepaiement = Typedepaiement::find($request->id);
        $typedepaiement->delete();
        return redirect()->route('indextypedepaiement')
            ->with('notice','typedepaiement <strong>'.$typedepaiement->nom_fr. '</strong> a été supprimé');
    }
}
