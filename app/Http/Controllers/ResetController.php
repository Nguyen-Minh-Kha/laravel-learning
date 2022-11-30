<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetController extends Controller
{
    /**
     * index reset pwd 
     */
    public function index(string $token)
    {
        $password_reset = DB::table('password_resets')->where('token', $token)->first();

        abort_if(!$password_reset, 403);

        $data = [
            'title' => $description = 'Reset my password - ' . config('app.name'),
            'description' => $description,
            'password_reset' => $password_reset,
        ];

        return view('auth.reset', $data);
    }
}
