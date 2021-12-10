<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request) {

        $role = $request->session()->get('role') ?? '';
        $by = $request->session()->get('by') ?? '';
        $tab = $request->session()->get('tab') ?? 'articles';

        if (!empty($role)) {
            return view('search')
                ->with('articles', Article::select('articles.*',)
                    ->distinct()
                    ->join('users', 'users.id', '=', 'articles.user_id')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->where('roles.role', $role)
                    ->get())
                ->with('users', User::select('users.*',)
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->where('roles.role', $role)
                    ->get())
                ->with('query', $by)
                ->with('tab', $tab);
        }

        return view('search')
            ->with('articles', Article::select('articles.*',)
                ->distinct()
                ->join('previews', 'previews.article_id', '=', 'articles.id')
                ->where('previews.value', 'like', "%$by%")
                ->get())
            ->with('users', User::where('name', 'like', "%$by%")->get())
            ->with('query', $by)
            ->with('tab', $tab);
    }

    public function searchRedirect(Request $request) {
        $by = $request->post('by') ?? '';

        $matches = null;
        $regex = '/\[(.*)]/';
        preg_match($regex, $by, $matches);

        $role = '';

        if (isset($matches[1])) {
            switch (mb_strtolower($matches[1])) {
                case 'администратор':
                case 'admin':
                    $role = 'admin';
                    break;
                case 'редактор':
                case 'editor':
                    $role = 'editor';
                    break;
                case 'пользователь':
                case 'user':
                    $role = 'user';
                    break;
                default:
                    $role = '';
            }
        }

        $request->session()->flash('by', $by);
        $request->session()->flash('role', $role);
        $request->session()->flash('tab', $request->get('tab') ?? 'articles');

        return redirect()->route('search');
    }
}

/*
 * select * from articles
 * join previews on preview.article_id = articles.id and previews.value like '%by%'
 *
 *
 * */
