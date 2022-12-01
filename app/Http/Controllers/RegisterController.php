<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Register form
     */
    public function index()
    {
        $data = [
            'title' => 'Register - ' . config('app.name'),
            'description' => 'Register to the website ' . config('app.name'),
        ];

        return view('auth.register', $data);
    }

    /**
     * register form
     */
    public function register()
    {
        request()->validate([
            'name' => 'required|min:3|max:191|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:9,20',
        ]);

        $user = new User;

        // create user and save
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        $success = 'register success';

        return back()->withSuccess($success);
    }
}
