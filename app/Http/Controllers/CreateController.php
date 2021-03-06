<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Content;
use App\Models\Preview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{

    public function index() {

        $this->authorize('editor', Auth::user());

        return view('create');
    }

    public function send(Request $request) {

        $this->authorize('editor', Auth::user());

        $article = json_decode($request->post('article'));

        DB::beginTransaction();

        try {
            $id = Article::insertGetId([
                'user_id' => Auth::id(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);

            $this->push($request, $article->preview, $id, function ($value) {
                return Preview::insert($value);
            });

            $this->push($request, $article->content, $id, function ($value) {
                return Content::insert($value);
            });

            DB::commit();

            return 'success';
        } catch (\Exception $exception) {
            DB::rollBack();
            return 'failed';
        }
    }

    private function push($request, $statements, $id, $callback) {
        foreach ($statements as $statement) {

            $type = $statement->type;
            if ($type === 'img') {
                $value = $statement->id;

                if ($request->hasFile($value)) {
                    $value = $request->file($value)->store('articles');
                } else {
                    continue;
                }
            } else if ($type === 'video') {
                $value = preg_replace(
                    "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                    "https://www.youtube.com/embed/$1",
                    $request[$statement->id]);
            } else {
                $value = $statement->value;
            }

            if ($statement->id === 'preview-header' || $statement->id === 'content-header') {
                if (empty($value))
                    throw new \Exception();
            }

            if (!empty($value)) {
                $callback([
                    'article_id' => $id,
                    'element' => $type,
                    'value' => $value
                ]);
            }
        }
    }
}
