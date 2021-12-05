<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Preview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class CreateController extends Controller
{
    public function show() {
        return view('create');
    }

    public function send(Request $request) {



        $article = json_decode($request->post('article'));

        DB::beginTransaction();

        try {
            $id = Article::insertGetId([ 'userId' => 0 ]);

            foreach ($article->preview as $statement) {

                $type = $statement->type;
                if ($type === 'img') {
                    $value = $statement->id;

                    if ($request->hasFile($value)) {
                        $value = $request->file($value)->store('articles');
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
                    Preview::insert([
                        'article_id' => $id,
                        'element' => $type,
                        'value' => $value
                    ]);
                }
            }

            DB::commit();

            return 'success';
        } catch (\Exception $exception) {
            DB::rollBack();
            return 'failed';
        }
    }
}
