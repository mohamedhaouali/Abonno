<?php
namespace App\Http\Controllers;

use App\Agence;
use App\Classe;
use App\Companie;
use App\Client;
use App\Clientstype;
use App\Ligne;
use App\Municipalite;
use App\Periodeabonnement;
use App\Region;
use App\Subscriptiontype;
use App\Typedepaiement;
use Illuminate\Http\Request;
use App\Exports\ClientExport;
use App\Imports\ClientImport;
use Excel;
use DB;


class ClientController extends Controller
{

//proteger les functions ou personnes connectes

    function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexclient()
    {
        $clients = Client::latest()->paginate(5);
        $clientstypes = Clientstype::all();
        $lignes = Ligne::all();
        $classes = Classe::all();


        return view('clients.index',
            ['clients' => $clients, 'classes' => $classes,
                'clientstypes' => $clientstypes, 'lignes' => $lignes


            ])
            ->with('i', (request()->input('page', 1) - 1) * 5);


    }

    //import Excel

    public function indexclientimport()
    {
        $clients = Client::latest()->paginate(5);
        $clientstypes =Clientstype::all();
        $lignes = Ligne::all();
        $classes =Classe::all();

        return view('clients.indexclientimport',
            ['clients'=>$clients,'classes'=>$classes,
                'clientstypes'=>$clientstypes,'lignes'=>$lignes
            ])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function addclient () {
        $clients = Client::all();

        $clientstypes =Clientstype::all();
        $lignes = Ligne::all();
        $classes =Classe::all();


        return view ('clients.add',['clients'=>$clients,'classes'=>$classes,
            'clientstypes'=>$clientstypes,'lignes'=>$lignes
        ]);


    }

    public function editclient(Request $request){
        $clients = Client::all();
        $clientstypes =Clientstype::all();
        $lignes = Ligne::all();
        $classes =Classe::all();

        $client = Client::find($request->id);


        return view ('clients.edit',[

            'client'=>$client,'clients'=>$clients,'classes'=>$classes,
            'clientstypes'=>$clientstypes,'lignes'=>$lignes

        ]);
    }

    public function storeclient(Request $request)
    {
        $request->validate(
               ['nomabonne' => 'required',
                'prenomabonne' => 'required',
                'cin' => 'required|numeric|digits:8',

                'nomparent' => 'bail|required|between:3,20|alpha',
                'prenomparent'=> 'bail|required|between:3,20|alpha',
                'file'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'clientstype_id' => 'required',
                'ligne_id'=> 'required',
                'prixtotale'=> 'required|numeric',

                'classe_id'=> 'required',

            ]
        );

        //add data


        $client = new Client();
        $client->nomabonne= $request->nomabonne;
        $client->prenomabonne= $request->prenomabonne;
        $client->nomparent= $request->nomparent;
        $client->prenomparent = $request->prenomparent;
        $client->cin = $request->cin;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        //$customer->image_path -> imageName;
        $client->profileimage = $imageName;
        $client->clientstype_id = $request->clientstype_id;


        $client->ligne_id = $request->ligne_id;

        $client->classe_id = $request->classe_id;

        $client->prixtotale= $request->prixtotale;

        $client->save();


        return redirect()
            ->route('indexclient')
            ->with('notice', 'Le client <strong>' . $client->nom . '</strong> a bien été ajouté');

    }

    public function updateclient(Request $request) {
        $client = Client::find($request->id);
        $request->validate(
            [
                'nomabonne' => 'required',
                'prenomabonne' => 'required',
                'cin' => 'required|numeric|digits:8',

                'nomparent' => 'required',
                'prenomparent'=> 'required',
                'file'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'clientstype_id' => 'required',
                'ligne_id'=> 'required',
                'prixtotale'=> 'required|numeric',

                'classe_id'=> 'required',
            ]
        );

        $client->nomabonne= $request->nomabonne;
        $client->prenomabonne= $request->prenomabonne;
        $client->nomparent= $request->nomparent;
        $client->prenomparent = $request->prenomparent;
        $client->cin = $request->cin;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        //$customer->image_path -> imageName;
        $client->profileimage = $imageName;
        $client->clientstype_id = $request->clientstype_id;


        $client->ligne_id = $request->ligne_id;

        $client->classe_id = $request->classe_id;

        $client->prixtotale= $request->prixtotale;

        $client->save();


        return redirect()->route('indexclient')->with('notice','Le client <strong>'. $client->nomabonne. '</strong> a bien été modifié');

    }

    public function deleteclient(Request $request) {
        $client = Client::find($request->id);
        $client->delete();
        return redirect()->route('indexclient')
            ->with('notice','client <strong>'.$client->nomabonne.'</strong> a été supprimé');
    }


    public function clientsearch(Request $request)
    {

        $data = Client::where('nomabonne', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('clients.search')->with([
            'clients' => $data,
        ]);
    }

    //import Excel

    public function importFormClient()
    {
        return view ('clients.import-form');
    }

    //import Excel

    public function importClient(Request $request ){

        Excel::import(new ClientImport,request()->file);
        return redirect('/indexclient');
    }
}
