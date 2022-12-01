<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Comment, Article};

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *  
     */
    public function store(Article $article)
    { }
}
