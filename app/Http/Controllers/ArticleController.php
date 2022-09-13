<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $data['articles'] = Article::all();
        return view('dashboard.article', $data);
    }
}