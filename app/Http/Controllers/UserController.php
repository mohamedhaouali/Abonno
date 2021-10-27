<?php
namespace App\Http\Controllers;
use App\Agence;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexlog()
    {
        $users = User::latest()->paginate(5);
        $agences = Agence::all();

        return view('users.indexlog',
            ['agences'=>$agences,'users'=>$users])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit(User $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }
    public function update(User $user)
    {
        if(Auth::user()->email == request('email')) {

            $this->validate(request(), [
                'name' => 'required',
                //  'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);
            $user->name = request('name');
            // $user->email = request('email');
            $user->password = bcrypt(request('password'));
            $user->save();
            return back();

        }
        else{

            $this->validate(request(), [
                'name' => 'required',
                //'email' => 'required|email|unique:users',
                'email' => 'email|required|unique:users,email,'.$this->segment(2),
                'password' => 'required|min:6|confirmed'
            ]);
            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));
            $user->save();
            return back();

        }



    }
}
