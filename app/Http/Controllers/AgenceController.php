<?php

namespace App\Http\Controllers;

use App\Agence;
use App\Municipalite;
use App\Subscription;
use App\User;

use Illuminate\Http\Request;

class AgenceController extends Controller
{
    function __construct() {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $agences = Agence::latest()->paginate(5);
        $municipalites = Municipalite::all();
        if ($request->ajax()) {
            $data = Agence::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('municipalite', function (Agence $agence) {
                    $municipalite=$agence->municipalite()->first();
                    return $municipalite->nom_fr;
                })

                ->addColumn('action', function($row){
                    $users=$row->users()->count()>0;
                    if (  $users ) {
                        $btn = '<a href="' . route('agence.show', $row->id) . '" class=" btn btn-info btn-sm mr-1">' . __('Afficher') . '</a><a href="' . route('agences.edit', $row->id) . '" class="edit btn btn-success btn-sm mr-1">' . __('Modifier') . '</a><button id="'.$row->id.'" href="' . route('agencies.block', $row->id) . '" data-toggle="modal" data-target="#block-alert-modal" class="block btn btn-danger btn-sm">' . __('Bloquer') . '</button> ';
                    }else{
                        $btn = '<a href="' . route('agence.show', $row->id) . '" class=" btn btn-info btn-sm mr-1">' . __('Afficher') . '</a><a href="' . route('agences.edit', $row->id) . '" class="edit btn btn-success btn-sm mr-1">' . __('Modifier') . '</a><button id="'.$row->id.'" href="' . route('agencies.destroy', $row->id) . '" data-toggle="modal" data-target="#danger-alert-modal" class="delete btn btn-danger btn-sm">' . __('Supprimer') . '</button> ';
                    }
                    return $btn;
                })
                ->rawColumns(['action','users'])
                ->make(true);
        }
        return view('agences.index',
            ['agences'=>$agences,'municipalites'=>$municipalites])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function create()
    {
        $municipalites = Municipalite::all();
        return view('agences.create',compact('municipalites'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'nom_fr'=>'required|between:3,20',
            'nom_ar'=>'required|between:3,20',
            'code'=>'required|numeric|unique:agences',
            'adresse'=>'required',
            'municipalite_id'=>'required',
            'latitude'  => 'nullable|required_with:longitude|max:20',
            'longitude' => 'nullable|required_with:latitude|max:20',
        ]);
        $agence = new Agence();
        $agence->nom_fr = $request->nom_fr;
        $agence->nom_ar = $request->nom_ar;
        $agence->code = $request->code;
        $agence->adresse = $request->adresse;
        $agence->municipalite_id = $request->municipalite_id;
        $agence->latitude = $request->latitude;
        $agence->longitude = $request->longitude;

        $agence->save();

        return redirect (route('agences.index'));
    }





    public function edit(Agence $agence,Request $request)
    {
        $municipalites = Municipalite::all();
        $agences = Agence::all();
        $agence = Agence::find($request->id);

        return view('agences.edit',[
          'municipalites'=>$municipalites,'agences'=>$agences,
            'agence'=>$agence,

        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Agence $agence)
    {

        $municipalites = Municipalite::all();
        $agences = Agence::all();
        $agence = Agence::find($request->id);


        return view('agences.show',[
            'municipalites'=>$municipalites,'agences'=>$agences,
            'agence'=>$agence,

        ]);


    }





    public function update(Request $request, Agence $agence)
    {
        request()->validate([
            'nom_fr'=>'required',
            'nom_ar'=>'required',
            'code'=>'required|numeric',
            'address'=>'required',
            'municipalite_id'=>'required',
            'latitude'  => 'nullable|required_with:longitude|max:20',
            'longitude' => 'nullable|required_with:latitude|max:20',
        ]);
        $agence->nom_fr = $request->nom_fr;
        $agence->nom_ar = $request->nom_ar;
        $agence->code = $request->code;
        $agence->address = $request->address;
        $agence->municipalite_id = $request->municipalite_id;
        $agence->latitude = $request->latitude;
        $agence->longitude = $request->longitude;


        $agence->update();

        return redirect (route('agences.index'));
    }


    public function delete(Request $request) {

        $agence = Agence::find($request->id);
        $agence->delete();
        return redirect()->route('index')
            ->with('notice','Le Bus <strong>'.$agence->nom_fr. '</strong> a été supprimé');
    }

    public function agencesearch(Request $request)
    {

            $data = Agence::where('nom_fr', 'like', '%'.$request->input('query').'%')->get();
            //return $data;
            return view('agences.search')->with([
                'agences' => $data,
            ]);
        }


}
