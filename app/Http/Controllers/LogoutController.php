<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * logout user
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
