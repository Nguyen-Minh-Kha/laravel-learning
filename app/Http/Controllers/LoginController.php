<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * login form
     */
    public function index()
    {
        
        $data = [
            'title' => 'login - ' . config('app.name'),
            'description' => 'Connect to your ' . config('app.name') . " - account"
        ];

        return view('auth.login', $data);
    }

    /**
     * login control
     */
    public function login()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = request()->has('remember');

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')], $remember)) {
            
            return redirect('/');
        }

        return back()->withError('wrong email or pwd.')->withInput();
    }
}
