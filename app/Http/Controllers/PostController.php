<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index(){
        $posts=Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        $collection=collect($post);
        $uniqueUser
        dd($posts);
        return view('index');
    }
}
