<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hologram;

class HologramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holograms = Hologram::latest()->paginate(5);

        return view('holograms.index', compact('holograms'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('holograms.create');
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
            'type' => 'required|max:255',
            'price' => 'required',
            'stockalert' => 'required|numeric',
        ]);
        $show = Hologram::create($validatedData);

        return redirect('/holograms')->with('success', 'Holograms  est ajouté');
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
        $hologram = Hologram::findOrFail($id);

        return view('holograms.edit', compact('hologram'));
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
            'type' => 'required|max:255',
            'price' => 'required',
            'stockalert' => 'required|numeric',
        ]);
        Hologram::whereId($id)->update($validatedData);

        return redirect('/holograms')->with('success', 'Holograms est modifie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hologram = Hologram::findOrFail($id);
        $hologram->delete();

        return redirect('/holograms')->with('success', 'Hologram est supprimé');
    }
}
