<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegistrController extends Controller
{
    public function create(){
        return view('register.create');
    }


    public function store(){
        $attributes = request()->validate([
            'name'=>['required','min:8','max:255'],
            'username'=>['required','min:8','max:255',Rule::unique('users','username')],
            'email'=>['required','min:8','max:255',Rule::unique('users','email')],
            'password'=>['required','min:8','max:255','min:8']

        ]);

        //to hash the password we can modify the value
        // $attributes['password']=bcrypt($attributes['password']);
        //or to hash the password we can use mutator on the user model

        //to check the value of the password we use Hash facade Hash::check

        $user=User::create($attributes);

        auth()->login($user);

        // session()->flash('success','your account has been created successfully ');

        return redirect('/')->with('success','your account has been created successfully');
    }
}
