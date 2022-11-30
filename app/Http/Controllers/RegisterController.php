<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
    * Register form
    */
    public function index()
    {
        $data = [
            'title' => 'Register - '.config('app.name'),
            'description' => 'Register to the website '.config('app.name'),
        ];

        return view('auth.register', $data);
    }
}
