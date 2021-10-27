<?php

namespace App\Http\Controllers\Admin;

use App\Agence;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    //proteger les functions ou personnes connectes

    function __construct() {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        $agences = Agence::all();

        return view('admin.users.index',
            ['agences'=>$agences,'users'=>$users])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::pluck('name','name')->all();
        $agences = Agence::all();

        return view('admin.users.create',
            ['agences'=>$agences,'roles'=>$roles,'users'=>$users]);

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required||min:6|same:confirm-password',
            'agence_id'=>'required',


        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->agence_id = $request->agence_id;





        // ajouter le role
        $role = Role::select('id')->where('name', 'utilisateur')->first();

        $user->roles()->attach($role);

        return redirect()
            ->route('admin.users.index')
            ->with('notice','User <strong>'. $user->name. '</strong> a bien été ajouté');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Request $request)
    {
        // si l'utilisateur n'est pas un admin retour la page d'accueuil
        if (Gate::denies('edit-users')) {

            return redirect()->route('admin.users.index');
        }

       $roles=Role::all();
       $agences = Agence::all();

        return view ('admin.users.edit',[
        'user' => $user,'roles' =>$roles,'agences'=>$agences
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'agence_id'=>'required',


        ]);
        //dd($request->roles);

        // synscronisation des roles avec le checkebox

        $user->roles()->sync($request->roles);

        /* une persitance des donnes utilisé lors de la modification dans la base de donne */

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt(request('password'));
        $user->agence_id = $request->agence_id;

        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        /* verificaton du droit de supression en et utilisant le gate dans le provider avec */

        if (Gate::denies('delete-users')) {

            return redirect()->route('admin.users.index');
        }

        //retirer les roles du cette utilisateur et les supprimer
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }


}
