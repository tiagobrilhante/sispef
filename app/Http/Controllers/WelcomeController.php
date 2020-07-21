<?php

namespace App\Http\Controllers;

use Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        if (Auth::user()) {

            return redirect()->action('HomeController@index');

        } else {

            return view('auth.login');

        }


    }

}
