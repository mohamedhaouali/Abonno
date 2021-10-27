<?php

namespace App\Http\Controllers;

use App\Periodeabonnement;
use App\Payementtype;
use App\Typedepaiement;
use Illuminate\Http\Request;

class PeriodeabonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexperiodeabonnement()
    {
        $periodeabonnements = Periodeabonnement::latest()->paginate(5);



        return view('periodeabonnements.index', compact(
            'periodeabonnements'
        ))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function addperiodeabonnement()
    {
        $periodeabonnements = Periodeabonnement::all();


        return view ('periodeabonnements.add',['periodeabonnements'=>$periodeabonnements,

            ]);
    }



    public function storeperiodeabonnement(Request $request)
    {
        $request->validate(
            [

                "datedebut"=>"required",
                "datefin"=>"required",
                "periode"=>"required",

            ]
        );


        $periodeabonnement = new Periodeabonnement();



        $periodeabonnement->datedebut = $request->datedebut;
        $periodeabonnement->datefin = $request->datefin;
        $periodeabonnement->periode = $request->periode;



        $periodeabonnement->save();



        return redirect()
            ->route('indexperiodeabonnement')
            ->with('notice','periodeabonnement <strong>'. $periodeabonnement->number. '</strong> a bien été ajouté');
    }

    public function editperiodeabonnement(Request $request){

        $periodeabonnements = Periodeabonnement::all();




        $periodeabonnement = Periodeabonnement::find($request->id);


        return view ('periodeabonnements.edit',[
            'periodeabonnements'=>$periodeabonnements,
            'periodeabonnement'=>$periodeabonnement

        ]);
    }

    public function updateperiodeabonnement(Request $request) {

        $periodeabonnement = Periodeabonnement::find($request->id);

        $request->validate(
            [
                "datedebut"=>"required",
                "datefin"=>"required",
                "periode"=>"required",

            ]
        );



        $periodeabonnement->datedebut = $request->datedebut;
        $periodeabonnement->datefin = $request->datefin;
        $periodeabonnement->periode = $request->periode;



        $periodeabonnement->save();


        return redirect()->route('indexperiodeabonnement')->with('notice','payement <strong>'. $periodeabonnement->number. '</strong> a bien été modifié');

    }

    public function deleteperiodeabonnement(Request $request) {

        $periodeabonnement = Periodeabonnement::find($request->id);
        $periodeabonnement->delete();
        return redirect()->route('indexperiodeabonnement')
            ->with('notice','periodeabonnement <strong>'.$periodeabonnement->number. '</strong> a été supprimé');
    }

}
