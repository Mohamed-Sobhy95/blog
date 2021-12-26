<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success','you\'ve logged out');
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(){

        //validate the requests

        $attributes = request()->validate([
            'email'=>['required','email'],
            'password'=>['required','min:8']
        ]);

        //attempt to authenticate user and login based on the given credentials

        //redirect to the home bage with a flash message

        if(auth()->attempt($attributes)){
            session()->regenerate();

            return back()->with('success','welcome back !');
        }

        //auth failed

        // return back()->withErrors(['email'=>'you\'re provided credentials couldn\'t be verified'])->withInput();

        throw ValidationException::withMessages(['email'=>'you\'re provided credentials couldn\'t be verified']);




    }
}
