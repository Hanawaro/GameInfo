<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Preview;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index($name) {
        return view('user', ['user' => User::where('name', $name)->first()]);
    }

    public function delete($id) {

        $article = Article::where('id', $id)->first();

        $this->authorize('owner', [Auth::user(), User::where('id', $article->user_id)->first()]);

        DB::beginTransaction();

        $imgToDelete = collect();

        try {

            foreach($article->previews()->get() as $element) {
                if ($element->element === 'img')
                    $imgToDelete->push($element->value);
            }
            foreach($article->contents()->get() as $element) {
                if ($element->element === 'img')
                    $imgToDelete->push($element->value);
            }
            Like::where('article_id', $id)->delete();

            $article->previews()->delete();
            $article->contents()->delete();
            $article->comments()->delete();

            $article->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        foreach ($imgToDelete as $img) {
            Storage::delete($img);
        }

        return redirect()->back();
    }

    public function roleEditor($id) {
        $this->authorize('admin', Auth::user());
        $user = User::where('id', $id)->first();

        $user->role_id = Role::where('role', 'editor')->first()->id;
        $user->save();

        return redirect()->back();
    }

    public function roleUser($id) {
        $this->authorize('admin', Auth::user());
        $user = User::where('id', $id)->first();

        $user->role_id = Role::where('role', 'user')->first()->id;
        $user->save();

        return redirect()->back();
    }

    public function rate(Request $request, $id) {

        if (!Auth::check())
            return redirect()->back();

        $like = Like::select()
            ->where('user_id', Auth::id())
            ->where('article_id', $id)
            ->first();

        if (array_key_exists('like', $request->post())) {

            if ($like !== null) {

                if ($like->liked) {
                    Article::where('id', $id)->decrement('like');
                    $like->delete();
                } else {
                    Article::where('id', $id)->decrement('dislike');
                    Article::where('id', $id)->increment('like');
                    $like->liked = true;
                    $like->save();
                }

            } else {
                Article::where('id', $id)->increment('like');

                Like::insert([
                    'user_id' => Auth::id(),
                    'article_id' => $id,
                    'liked' => true
                ]);
            }

        } else if (array_key_exists('dislike', $request->post())) {

            if ($like !== null) {

                if ($like->liked) {
                    Article::where('id', $id)->decrement('like');
                    Article::where('id', $id)->increment('dislike');
                    $like->liked = false;
                    $like->save();
                } else {
                    Article::where('id', $id)->decrement('dislike');
                    $like->delete();
                }

            } else {
                Article::where('id', $id)->increment('dislike');

                Like::insert([
                    'user_id' => Auth::id(),
                    'article_id' => $id,
                    'liked' => false
                ]);
            }

        }

        return redirect()->back();
    }

    public function comment(Request $request, $id) {
        if (!Auth::check() || empty($request->post('value')))
            return redirect()->back();

        Comment::insert([
            'article_id' => $id,
            'user_id' => Auth::id(),
            'value' => $request->post('value'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->back();
    }

    public function deleteComment(Request $request, $id) {
        $comment = Comment::where('id', $id)->first();
        $this->authorize('owner', [Auth::user(), Comment::where('id', $comment->user_id)->first()]);

        $comment->delete();

        return redirect()->back();
    }

}
