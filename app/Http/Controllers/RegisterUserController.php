<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    //
    public function create()
    {
            // sanity check did we hit this end point
            //dd('In RegisterUserController create function');
            return view('auth.register');
    }

    public function store()
    {
            // sanity check did we hit this end point
            //dd('In RegisterUserController store function');
            dd(request()->all());
            
    }
}
