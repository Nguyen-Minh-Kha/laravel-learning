<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
    * login form
    */
    public function index()
    {
        $data=[
            'title' => 'login - '.config('app.name'),
            'description' => 'Connect to your '.config('app.name')." - account"
        ];

        return view('auth.login', $data);
    }
    
    /**
    * login control
    */
    public function login()
    {
        
    }
}
