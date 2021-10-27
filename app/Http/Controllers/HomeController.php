<?php

namespace App\Http\Controllers;

use App\Abonnementcivile;
use Illuminate\Http\Request;

use App\Client;
use App\Abonnementscolaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function index1()
    {
        return view('home1');
    }

    public function index4()
    {
        return view('home4');
    }

    public function viewlogin(){
        return view('viewlogin');
    }

    public function abonno()
    {
        return view('abonno');
    }

    public function listeabonno()
    {
        return view('listeabonno');
    }

// dashboard pour abonnements scolaires

    public function dashboard()
    {
        $abonnementscolaires=Abonnementscolaire::count();
        $clients=Client::count();
        $money=Abonnementscolaire::all()->sum('prixtotale');
        $currentDate = new \DateTime('-1 month');
        $endDate = new \DateTime('today');


        return view('dashboard',compact('abonnementscolaires','clients','money'));
    }

    // dashboard pour abonnements civiles

    public function dashboard1()
    {
        $abonnementciviles=Abonnementcivile::count();
        $clients=Client::count();
        $money=Abonnementcivile::all()->sum('prixtotale');
        $currentDate = new \DateTime('-1 month');
        $endDate = new \DateTime('today');


        return view('dashboard1',compact('abonnementciviles','clients','money'));
    }

    // dashboard pour abonnements sociales

    public function dashboard2()
    {
        $abonnementsociales=Abonnementcivile::count();
        $clients=Client::count();
        $money=Abonnementcivile::all()->sum('prixtotale');
        $currentDate = new \DateTime('-1 month');
        $endDate = new \DateTime('today');


        return view('dashboard2',compact('abonnementsociales','clients','money'));
    }
// image pour user
    public function home3(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back();
    }



}
