<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AccountController extends Controller
{
    public function __invoke(Request $request)
    {
        $users = $request->user()->count();
        return view('account.index');
    }
}
