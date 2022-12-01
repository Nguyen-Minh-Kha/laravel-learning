<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('profile');
    }

    public function profile(User $user)
    {
        return 'I am an user and my name is ' . $user->name;
    }

    /**
     *  edit user form
     */
    public function edit()
    {
        $user = auth()->user();
        $data = [
            'title' => $description = 'edit my profile',
            'description' => $description,
            'user' => $user,
        ];

        return view('user.edit', $data);
    }

    /**
     *  save user infos
     */
    public function store()
    {
        $user = auth()->user();
        request()->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
            'avatar' => ['sometimes', 'nullable', 'file', 'image', 'mimes:jpg,jpeg,png,gif'],
        ]);
    }
}
