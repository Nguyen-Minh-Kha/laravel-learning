<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Comment, Article};

use App\Http\Requests\CommentRequest;

use App\Events\CommentWasCreated;

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
            event(new CommentWasCreated($comment));
        }

        $success = "Comment added successfully";

        return back()->withSuccess($success);
    }
}
