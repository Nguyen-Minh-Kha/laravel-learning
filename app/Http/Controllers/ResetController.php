<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    /**
     * update pwd 
     */
    public function reset()
    {
        request()->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|between:9,20|confirmed'
        ]);

        if (!DB::table('password_resets')
            ->where('email', request('email'))
            ->where('token', request('token'))->count()) {
            $error = 'check your email adress';
            return back()->withError($error)->withInput();
        }

        $user = User::whereEmail(request('email'))->firstOrFail();

        $user->password = bcrypt(request('password'));
        $user->save();

        DB::table('password_resets')->where('email', request('email'))->delete();

        $success = 'Password reset successful';
        return redirect()->route('login')->withSuccess($success);
    }
}
