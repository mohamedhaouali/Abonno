<?php

namespace App\Http\Controllers;

use App\Subscriptiontype;
use Illuminate\Http\Request;

class SubscriptionstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptiontypes = Subscriptiontype::latest()->paginate(5);

        return view('subscriptionstypes.index', compact('subscriptiontypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscriptionstypes.create');
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
            'nom_fr' => 'required',
            'nom_ar' => 'required',
            'description' =>'required'

        ]);
        $show = Subscriptiontype::create($validatedData);

        return redirect('/subscriptionstypes')->with('success', 'Subscription type est ajouté');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriptiontype = Subscriptiontype::findOrFail($id);

        return view('subscriptionstypes.edit', compact('subscriptiontype'));
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
            'nom_fr' => 'required',
            'nom_ar' => 'required',
            'description' => 'required',

        ]);
        Subscriptiontype::whereId($id)->update($validatedData);

        return redirect('/subscriptionstypes')->with('success', 'Subscription type est modifie');
    }

    public function destroy($id)
    {
        $subscriptiontype = Subscriptiontype::findOrFail($id);
        $subscriptiontype->delete();

        return redirect('/subscriptionstypes')->with('success', 'Subscription type est supprimé');
    }
}
