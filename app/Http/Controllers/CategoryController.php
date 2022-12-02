<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    /**
     *  
     */
    public function show(Category $category)
    {
        $articles = $category->articles()->withCount('comments')->latest()->paginate(5);
        $data = [
            'title' => $category->name,
            'description' => $category->name . ' category articles',
            'category' => $category,
            'articles' => $articles
        ];
        return view('category.show', $data);
    }
}
