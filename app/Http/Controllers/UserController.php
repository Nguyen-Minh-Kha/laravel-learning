<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use League\Config\Exception\ValidationException;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('profile');
    }

    public function profile(User $user)
    {
        $articles = $user->articles()->withCount('comments')->orderByDesc('comments_count')->paginate(4);
        $data = [
            'title' => $user->name . ' profile',
            'description' => $user->name . 'has joined the ' . $user->created_at->isoFormat('LLL') . ' and has posted ' . $user->articles()->count() . ' articles.',
            'user' => $user,
            'articles' => $articles,
        ];

        return view('user.profile', $data);
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
     *  password form
     */
    public function password()
    {
        $data = [
            'title' => $description = 'edit my password',
            'description' => $description,
            'user' => $user = auth()->user(),
        ];

        return view('user.password', $data);
    }

    /**
     *  update pwd
     */
    public function updatePassword()
    {
        request()->validate([
            'current' => 'required|password',
            'password' => 'required|between:9,20|confirmed',
        ]);

        $user = auth()->user();

        $user->password = bcrypt(request('password'));

        $user->save();

        $success = 'password updated';

        return back()->withSuccess($success);
    }

    /**
     *  save user infos
     */
    public function store()
    {
        $user = auth()->user();

        DB::beginTransaction();

        try {
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

                // check file uploaded
                $ext = request()->file('avatar')->extension();
                $filename = Str::slug($user->name) . '-' . $user->id . '.' . $ext;
                $path = request()->file('avatar')->storeAs('avatars/' . $user->id, $filename);

                $thumbnailImage = Image::make(request()->file('avatar'))->fit(200, 200, function ($constraint) {
                    $constraint->upsize();
                })->encode($ext, 50);

                $thumbnailPath = 'avatars/' . $user->id . '/thumbnail/' . $filename;

                Storage::put($thumbnailPath, $thumbnailImage);

                //save file in DB
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
            }
        } catch (ValidationException $e) {
            DB::rollback();
            dd($e->getErrors());
        }

        DB::commit();

        $success = 'user updated successfully';

        return back()->withSuccess($success);
    }

    /**
     *  delete the user from the database
     */
    public function destroy(User $user)
    { }
}
