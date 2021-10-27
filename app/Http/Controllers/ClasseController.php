<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Etudiant;
use Illuminate\Http\Request;

class ClasseController extends Controller
{



    public function indexclasse()
    {

        $classes = Classe::latest()->paginate(5);

        return view('classes.index',
            ['classes' => $classes])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function addclasse()
    {

        $classes = Classe::all();


        return view('classes.add', ['classes' => $classes

        ]);
    }


    public function editclasse(Request $request)
    {

        $classes = Classe::all();

        $classe = Classe::find($request->id);


        return view('classes.edit', [
            'classes' => $classes,
            'classe' => $classe,

        ]);
    }

    public function storeclasse(Request $request)
    {
        $request->validate(
            ['nom' => 'required',

            ]
        );


        $classe = new Classe();
        $classe->nom = $request->nom;


        $classe->save();


        return redirect()
            ->route('indexclasse')
            ->with('notice', 'Classe <strong>' . $classe->nom . '</strong> a bien été ajouté');
    }


    public function updateclasse(Request $request)
    {

        $classe = Classe::find($request->id);

        $request->validate(
            ['nom' => 'required',


            ]
        );


        $classe->nom = $request->nom;


        $classe->save();


        return redirect()->route('indexclasse')->with('notice', 'classe <strong>' . $classe->nom . '</strong> a bien été modifié');

    }

    public function deleteclasse(Request $request)
    {

        $classe = Classe::find($request->id);

        $classe->delete();
        return redirect()->route('indexclasse')
            ->with('notice', 'classe <strong>' . $classe->nom . '</strong> a été supprimé');
    }



}
