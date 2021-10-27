<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use PDF;

class IdentiteController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('account.identite', ['user' => $request->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $user->id,

        ]);

        $request->merge(['newsletter' => $request->has('newsletter')]);

        $user->update($request->all());

        $request->session()->flash('message', config('messages.accountupdated'));

        return back();
    }

    /**
     * Show the RGPD page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rgpd(Request $request)
    {
        $email = Shop::select('email')->firstOrFail()->email;

        return view('account.rgpd.index', compact('email'));
    }

    /**
     * Get the PDF for RGPD details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pdf(Request $request)
    {
        $user = $request->user();

        $user->load('addresses', 'orders', 'orders.state', 'orders.products');

        $shop= Shop::firstOrFail();

        $pdf = PDF::loadView('account.rgpd.pdf', compact('user', 'shop'));

        return $pdf->download('rgpd.pdf');
    }
}
