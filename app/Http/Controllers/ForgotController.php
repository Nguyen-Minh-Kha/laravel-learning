<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotController extends Controller
{
    /**
     * index forgot pwd  
     */
    public function index()
    {
        $data = [
            'title' => $description = 'forgot my password - ' . config('app.name'),
            'description' => $description,
        ];

        return view('auth.forgot', $data);
    }

    /**
     * check data and send liunk by mail
     */
    public function store()
    {
        request()->validate([
            'email' => 'required|email|exists:users'
        ]);
    }
}
