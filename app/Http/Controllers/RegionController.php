<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use App\Exports\RegionExport;
use App\Imports\RegionImport;
use Excel;


class RegionController extends Controller
{
    public function indexregion()
    {
        $regions = Region::latest()->paginate(5);

        return view('regions.index',
            ['regions'=>$regions])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function indexregionimport()
    {
        $regions = Region::latest()->paginate(5);

        return view('regions.indexregionimport',
            ['regions'=>$regions])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function addregion () {

        $regions = Region::all();


        return view ('regions.add',['regions'=>$regions

        ]);
    }

    public function editregion(Request $request){

        $regions = Region::all();

        $region = Region::find($request->id);


        return view ('regions.edit',[
            'regions'=>$regions,
            'region'=>$region,

        ]);
    }


    public function storeregion(Request $request)
    {
        $request->validate(
            [   'nom_fr'=>'required',
                'nom_ar'=>'required',



            ]
        );


        $region = new Region();
        $region->nom_fr = $request->nom_fr;
        $region->nom_ar = $request->nom_ar;


        $region->save();



        return redirect()
            ->route('indexregion')
            ->with('notice','Region <strong>'. $region->nom_fr. '</strong> a bien été ajouté');
    }

    public function updateregion(Request $request) {

        $region = Region::find($request->id);

        $request->validate(
               [
                   'nom_fr'=>'required',
                   'nom_ar'=>'required',


            ]
        );


        $region->nom_fr = $request->nom_fr;
        $region->nom_ar = $request->nom_ar;


        $region->save();


        return redirect()->route('indexregion')->with('notice','Agence <strong>'. $region->nom_fr. '</strong> a bien été modifié');

    }

    public function deleteregion(Request $request) {

        $region= Region::find($request->id);
        $region->delete();
        return redirect()->route('indexregion')
            ->with('notice','Le Bus <strong>'.$region->nom_fr. '</strong> a été supprimé');
    }

    public function regionsearch(Request $request)
    {

        $data = Region::where('nom_fr', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('regions.search')->with([
            'regions' => $data,
        ]);
    }

    public function importFormRegion()
    {
        return view ('regions.import-form');
    }

    public function importregion(Request $request ){

        Excel::import(new RegionImport,request()->file);
        return redirect('/indexregion');
    }


}
