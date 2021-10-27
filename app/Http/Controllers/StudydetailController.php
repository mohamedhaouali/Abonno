<?php

namespace App\Http\Controllers;

use App\Etablishment;
use App\Level;
use App\Studydetail;
use Illuminate\Http\Request;

class StudydetailController extends Controller
{
    public function indexstudydetail()
    {
        $studydetails = Studydetail::latest()->paginate(5);
        $levels = Level::all();
        $etablishments = Etablishment::all();

        return view('studydetails.index',
            ['studydetails' => $studydetails, 'levels' => $levels, 'etablishments' => $etablishments
            ])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addstudydetail()
    {

        $studydetails = Studydetail::all();
        $levels = Level::all();
        $etablishments = Etablishment::all();

        return view('studydetails.add', ['studydetails' => $studydetails, 'levels' => $levels,
            'etablishments' => $etablishments

        ]);
    }

    public function editstudydetail(Request $request)
    {

        $studydetails = Studydetail::all();
        $levels = Level::all();
        $etablishments = Etablishment::all();

        $studydetail = Studydetail::find($request->id);


        return view('studydetails.edit', [
            'studydetails' => $studydetails, 'levels' => $levels,
            'etablishments' => $etablishments,
            'studydetail' => $studydetail

        ]);
    }
    public function storestudydetail(Request $request)
    {
        $request->validate(
            [   'name'=>'required',
                'level_id'=>'required',
                'etablishment_id'=>'required',

            ]
        );


        $studydetail = new Studydetail();
        $studydetail->name = $request->name;

        $studydetail->level_id = $request->level_id;
        $studydetail->etablishment_id = $request->etablishment_id;
        $studydetail->save();

        return redirect()
            ->route('indexstudydetail')
            ->with('notice','studydetail <strong>'. $studydetail->name. '</strong> a bien été ajouté');
    }

    public function updatestudydetail(Request $request) {

        $studydetail = Studydetail::find($request->id);

        $request->validate(
            [   'name'=>'required',
                'level_id'=>'required',
                'etablishment_id'=>'required',

            ]
        );

        $studydetail->name = $request->name;

        $studydetail->level_id = $request->level_id;
        $studydetail->etablishment_id = $request->etablishment_id;

        $studydetail->save();


        return redirect()->route('indexstudydetail')->with('notice','studydetail <strong>'. $studydetail->name. '</strong> a bien été modifié');

    }

    public function deletestudydetail(Request $request) {
        $studydetail = Studydetail::find($request->id);

        $studydetail->delete();
        return redirect()->route('indexstudydetail')
            ->with('notice','municipalite <strong>'.$studydetail->name. '</strong> a été supprimé');
    }

}
