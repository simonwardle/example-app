<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

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
                //dd(request()->all());

                // validate
                $attributes = request()->validate([
                        'first_name'    => ['required'],
                        'last_name'     => ['required'],
                        'email'         => ['required', 'email', 'max:254'],
                        'password'      => ['required', Password::min(6)->mixedCase(), 'confirmed'],
                ]);

                // create the user
                $user = User::create($attributes);

                // log in
                Auth::login($user);

                // redirect somewhere
                return redirect('/jobs');
        }


}
