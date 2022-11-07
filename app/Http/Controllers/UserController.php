<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(string $username)
    {
        return 'I am an user and my name is '.$username;
    }
}
