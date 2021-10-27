<?php

namespace App\Http\Controllers;

use App\Companie;
use Illuminate\Http\Request;
use App\Imports\CompanieImport;
use App\Exports\CompanieExport;
use Excel;




class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companie::latest()->paginate(5);

        return view('companies.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexcompanieimport()
    {
        $companies = Companie::latest()->paginate(5);

        return view('companies.indexcompanieimport',
            compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_fr' => 'required|unique:companies|max:255',
            'nom_ar' => 'required|unique:companies|max:255',
            'adresse' => 'required',
        ]);
        $show = Companie::create($validatedData);

        return redirect('/companies')->with('success', 'Company est ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companie = Companie::findOrFail($id);

        return view('companies.edit', compact('companie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_fr' => 'required|unique:companies|max:255',
            'nom_ar' => 'required|unique:companies|max:255',
            'adresse' => 'required',
        ]);
        Companie::whereId($id)->update($validatedData);

        return redirect('/companies')->with('success', 'Companie est modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companie = Companie::findOrFail($id);
        $companie->delete();

        return redirect('/companies')->with('success', 'Companie est supprimé');
    }

    public function importFormCompanie()
    {
        return view ('companies.import-form');
    }

    public function importCompanie(Request $request ){

        Excel::import(new CompanieImport,request()->file);
        return redirect('/companies');
    }


}
