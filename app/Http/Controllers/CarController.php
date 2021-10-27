<?php

namespace App\Http\Controllers;

use App\Agence;
use App\Car;
use App\Card;
use App\Etat;
use App\Ligne;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexcar()
    {
        $cars = Car::latest()->paginate(5);
        $lignes = Ligne::all();
        $etats = Etat::all();

        return view('cars.index',
            ['cars'=>$cars,'lignes'=>$lignes,'etats'=>$etats])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addcar () {
        $cars = Car::all();
        $lignes = Ligne::all();
        $etats = Etat::all();
        return view ('cars.add',['cars'=>$cars ,'lignes'=>$lignes,'etats'=>$etats

        ]);
    }
    public function editcar(Request $request){

        $cars = Car::all();
        $lignes = Ligne::all();
        $etats = Etat::all();

        $car = Car::find($request->id);


//        dd($tags_id);

        return view ('cars.edit',[
            'cars'=>$cars,
            'lignes'=>$lignes,
            'etats'=>$etats,
            'car'=>$car,

        ]);
    }

    public function storecar(Request $request)
    {
        $request->validate(
            [ 'nom'=>'required|unique:cars,nom',
              'marque'=>'required|between:3,20|alpha',
              'date_circulation'=>'required',
              'place_number'=>'required|numeric',
              'condition'=>'bail|required|between:3,20|alpha',
              'comment'=>'required',
              'ligne_id'=>'required',
              'etat_id'=>'required',

            ]
        );


        $car = new Car();
        $car->nom = $request->nom;
        $car->marque = $request->marque;
        $car->date_circulation = $request->date_circulation;
        $car->place_number = $request->place_number;
        $car->condition = $request->condition;
        $car->comment = $request->comment;
        $car->ligne_id = $request->line_id;
        $car->etat_id = $request->etat_id;


        $car->save();



        return redirect()
            ->route('indexcar')
            ->with('notice','Le Bus <strong>'. $car->name. '</strong> a bien été ajouté');

    }


    public function updatecar(Request $request) {
        $car = Car::find($request->id);
        $request->validate(
                       [
                       'nom'=>'required|unique:cars,nom',
                       'marque'=>'required|between:3,20|alpha',
                       'date_circulation'=>'required',
                       'place_number'=>'required|numeric',
                        'condition'=>'bail|required|between:3,20|alpha',
                       'comment'=>'required',
                       'ligne_id'=>'required',
                       'etat_id'=>'required',

            ]
        );


        $car->nom = $request->nom;
        $car->marque = $request->marque;
        $car->date_circulation = $request->date_circulation;
        $car->place_number = $request->place_number;
        $car->condition = $request->condition;
        $car->comment = $request->comment;
        $car->ligne_id = $request->line_id;
        $car->etat_id = $request->etat_id;
        $car->save();


        return redirect()->route('indexcar')->with('notice','Le Bus <strong>'. $car->name. '</strong> a bien été modifié');

    }


    public function deletecar(Request $request) {

        $car = Car::find($request->id);
        $car->delete();
        return redirect()->route('indexcar')
            ->with('notice','Le Bus <strong>'.$car->nom.'</strong> a été supprimé');
    }

    public function carsearch(Request $request)
    {

        $data = Car::where('nom', 'like', '%'.$request->input('query').'%')->get();
        //return $data;
        return view('cars.search')->with([
            'cars' => $data,
        ]);
    }




}
