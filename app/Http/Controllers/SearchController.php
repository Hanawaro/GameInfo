<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function show(Request $request) {

        $by = $request->get('by') ?? '';

        return view('search')
            ->with('articles', Article::select('articles.*',)
                ->distinct()
                ->join('previews', 'previews.article_id', '=', 'articles.id')
                ->where('previews.value', 'like', "%$by%")
                ->get())
            ->with('users', Collection::empty())
            ->with('query', $by);
    }
}

/*
 * select * from articles
 * join previews on preview.article_id = articles.id and previews.value like '%by%'
 *
 *
 * */
