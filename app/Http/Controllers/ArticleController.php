<?php

namespace App\Http\Controllers;

use App\Models\{
    Article,
    Category
};

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
        $categories = Category::get();

        $articles = Article::all();

        $data = [
            'title' => $description = 'Create a new article',
            'description' => $description,
            'categories' => $categories

        ];

        return view('article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'title' => ['required', 'max:20', 'unique:articles,title,'],
            'content' => ['required'],
            'category' => ['sometimes', 'nullable', 'exists:categories,id'],
        ]);

        $article = new Article();

        $article->user_id = Auth::id(); // get current user id
        $article->category_id = request('category');
        $article->title = request('title');
        $article->slug = Str::slug($article->title);
        $article->content = request('content');

        $article->save();

        $success = 'article created successfully';

        return back()->withSuccess($success);
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
