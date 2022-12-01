<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Comment, Article};

use App\Http\Requests\CommentRequest;

use App\Notifications\NewComment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *  
     */
    public function store(CommentRequest $request, Article $article)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->id();

        $comment = $article->comments()->create($validatedData);

        if (auth()->id() != $article->user_id) {
            $when = now()->addSeconds(10);
            $article->user->notify((new NewComment($comment))->delay($when));
        }

        $success = "Comment added successfully";

        return back()->withSuccess($success);
    }
}
