<?php

namespace App\Http\Controllers;

use App\Societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{

    public function indexsociete()
    {

        $societes = Societe::latest()->paginate(5);

        return view('societes.index',
            ['societes' => $societes])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function addsociete()
    {

        $societes = Societe::all();


        return view('societes.add', ['societes' => $societes

        ]);
    }


    public function editsociete(Request $request)
    {

        $societes = Societe::all();

        $societe = Societe::find($request->id);


        return view('societes.edit', [
            'societes' => $societes,
            'societe' => $societe,

        ]);
    }

    public function storesociete(Request $request)
    {
        $request->validate(
            ['nom' => 'bail|required|between:3,20|alpha',

            ]
        );


        $societe = new Societe();

        $societe->nom = $request->nom;


        $societe->save();


        return redirect()
            ->route('indexsociete')
            ->with('notice', 'Classe <strong>' . $societe->nom . '</strong> a bien été ajouté');
    }


    public function updatesociete(Request $request)
    {

        $societe = Societe::find($request->id);

        $request->validate(
            ['nom' => 'bail|required|between:3,20|alpha',


            ]
        );


        $societe->nom = $request->nom;


        $societe->save();


        return redirect()->route('indexsociete')->with('notice', 'societe <strong>' . $societe->nom . '</strong> a bien été modifié');

    }

    public function deletesociete(Request $request)
    {

        $societe = Societe::find($request->id);

        $societe->delete();
        return redirect()->route('indexsociete')
            ->with('notice', 'classe <strong>' . $societe->nom . '</strong> a été supprimé');
    }
}
