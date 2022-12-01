<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::orderBy('id')->paginate(5);

        $data = [
            'title' => 'Articles - ' . config('app.name'),
            'description' => 'List of your articles - ' . config('app.name'),
            'articles' => $articles
        ];

        return view('article.index', $data);

        // $count = Article::count();

        // dd($count);

        //$articles = Article::orderByDesc('id')->skip(10)->take(15)->get();

        // $article = Article::where('title', 'Modi et esse blanditiis atque.')->first();

        // dd($article->id);

        // $articles = Article::orderByDesc('id')->get();

        //     foreach ($articles as $article) {
        //         dump($article->title, $article->id);
        //     }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => $description = 'Create a new article',
            'description' => $description,

        ];

        return view('article.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $data = [
            'title' => $article->title . ' - ' . config('app.name'),
            'description' => $article->title . ' - ' . Str::words($article->content, 10),
            'article' => $article
        ];

        return view('article.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //user authentifié, edit via un formulaire
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //MAJ par user authentifié de l'article en DB
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User delete l'article
    }
}
