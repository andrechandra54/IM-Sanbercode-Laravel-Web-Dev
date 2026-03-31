<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register() {
        return view('form');
    }

    public function welcome(Request $request) {
        $fname = $request->input('fname');
        $lname = $request->input('lname');

        return view('welcome', ["first" => $fname, "last" => $lname]);
    }
}
