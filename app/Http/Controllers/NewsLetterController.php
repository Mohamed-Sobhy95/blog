<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsLetterController extends Controller
{
    //

    public function __invoke(Newsletter $newsletter)
    {
        // ddd($newsletter);
        try {

            $newsletter->subscribe(request('email'));


        } catch (Exception $th) {
            throw  ValidationException::withMessages(['email'=>'please enter a correct email']);
        }

        return redirect('/')->with('success','you are subscribed now');
    }
}
