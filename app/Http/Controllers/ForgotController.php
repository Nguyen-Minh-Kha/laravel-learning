<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

use App\Notifications\PasswordResetNotification;

class ForgotController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

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

        $token = Str::uuid();

        DB::table('password_resets')->insert([
            'email' => request('email'),
            'token' => $token,
            'created_at' => now(),
        ]);

        $user = User::whereEmail(request('email'))->firstOrfail();

        $user->notify(new PasswordResetNotification($token));

        // send notification with a secure link
        $success = 'Please check your email and follow the instructions';
        return back()->withSuccess($success);
    }
}
