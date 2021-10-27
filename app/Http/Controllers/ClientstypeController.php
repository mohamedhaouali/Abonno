<?php

namespace App\Http\Controllers;

use App\Clientstype;
use Illuminate\Http\Request;

class ClientstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientstypes = Clientstype::latest()->paginate(5);

        return view('clientstypes.index', compact('clientstypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientstypes.create');
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
            'nom_fr' => 'required',
            'nom_ar' => 'required',

        ]);
        $show = Clientstype::create($validatedData);

        return redirect('/clientstypes')->with('Clientstype est ajouté');
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
        $clientstype = Clientstype::findOrFail($id);

        return view('clientstypes.edit', compact('clientstype'));
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
            'nom_fr' => 'required',
            'nom_ar' => 'required',

        ]);
        Clientstype::whereId($id)->update($validatedData);

        return redirect('/clientstypes')->with('Clientstype est modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientstype =   Clientstype::findOrFail($id);

        $clientstype->delete();

        return redirect('/clientstypes')->with('success', 'Clienttype est supprimé');
    }
}
