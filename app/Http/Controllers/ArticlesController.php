<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Preview;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function indexAll(Request $request)
    {
        return view('articles')
            ->with('articles', Article::orderBy('created_at', 'desc')->get())
            ->with('message', 'Все подряд')
            ->with('global', 'news')
            ->with('local', 'all');

    }

    public function indexOne($id) {
        return $id;
    }

    public function sortByRedirect(Request $request)
    {
        return redirect()
            ->route("article.sort", ['global' => $request->post('global'), 'local' => $request->post($request->post('global'))]);

    }

    public function sortBy($global, $local)
    {
        $result = [[], 'Все подряд'];

        switch ($global) {
            case 'news':
                $result = $this->news($local);
                break;
            case 'best':
                $result = $this->best($local);
                break;
        }

        return view('articles')
            ->with('articles', $result[0])
            ->with('message', $result[1])
            ->with('global',$global)
            ->with('local', $local);
    }

    private function news($type)
    {
        switch ($type) {
            case 'all':
                return [Article::orderBy('created_at', 'desc')->get(), 'Все подряд'];
            default:
                return [Article::where('rate', '>=', $type)
                    ->orderBy('created_at', 'desc')
                    ->get(), 'Новые с рейтингом ≥ ' . $type];
        }
    }

    private function best($type)
    {
        $now = new DateTime();

        switch ($type) {
            case 'all':
                return [Article::orderBy('rate', 'desc')->get(), 'Лучшие за всё время'];
            case 'day':
                return [Article::where('created_at', '>=', date(DATE_ATOM, $now->sub(new DateInterval('P1D'))->getTimestamp()))
                    ->orderBy('rate', 'desc')
                    ->get(), 'Лучшие за сутки'];
            case 'week':
                return [Article::where('created_at', '>=', date(DATE_ATOM, $now->sub(new DateInterval('P1W'))->getTimestamp()))
                    ->orderBy('rate', 'desc')
                    ->get(), 'Лучшие за неделю'];
            case 'month':
                return [Article::where('created_at', '>=', date(DATE_ATOM, $now->sub(new DateInterval('P1M'))->getTimestamp()))
                    ->orderBy('rate', 'desc')
                    ->get(),  'Лучшие за месяц'];
            case 'year':
                return [Article::where('created_at', '>=', date(DATE_ATOM, $now->sub(new DateInterval('P1Y'))->getTimestamp()))
                    ->orderBy('rate', 'desc')
                    ->get(),  'Лучшие за год'];
        }
        return [];
    }
}
