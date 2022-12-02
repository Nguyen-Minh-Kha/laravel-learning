<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

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
        $user = $user->updateOrCreate(
            ['id' => $user->id],
            request()->validate([
                'name' => ['required', 'min:3', 'max:20', Rule::unique('users')->ignore($user)],
                'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
                'avatar' => ['sometimes', 'nullable', 'file', 'image', 'mimes:jpg,jpeg,png,gif'], // 'dimensions:min_width=100,min_height=200'
            ])
        );

        if (request()->hasFile('avatar') && request()->file('avatar')->isValid()) {

            if (Storage::exists('avatars/' . $user->id)) { // deletes existing avatars
                Storage::deleteDirectory('avatars/' . $user->id);
            }

            $ext = request()->file('avatar')->extension();
            $filename = Str::slug($user->name) . '-' . $user->id . '.' . $ext;
            $path = request()->file('avatar')->storeAs('avatars/' . $user->id, $filename);

            $thumbnailImage = Image::make(request()->file('avatar'))->fit(200, 200, function ($constraint) {
                $constraint->upsize();
            })->encode($ext, 50);

            $thumbnailPath = 'avatars/' . $user->id . '/thumbnail/' . $filename;

            Storage::put($thumbnailPath, $thumbnailImage);

            $user->avatar()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'filename' => $filename,
                    'url' => Storage::url($path),
                    'path' => $path,
                    'thumb_url' => Storage::url($thumbnailPath),
                    'thumb_path' => $thumbnailPath,
                ]
            );

            $success = 'user updated successfully';

            return back()->withSuccess($success);
        }
    }
}
