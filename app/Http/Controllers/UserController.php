<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Preview;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($name) {
        return view('user', ['user' => User::where('name', $name)->first()]);
    }

    public function delete($id) {

        $article = Article::where('id', $id)->first();

        $this->authorize('owner', [Auth::user(), User::where('id', $article->user_id)->first()]);

        DB::beginTransaction();

        try {

            $article->previews()->delete();
            $article->contents()->delete();
            $article->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->back();
    }

    public function roleEditor($id) {
        $this->authorize('admin', Auth::user());
        $user = User::find($id)->first();

        $user->role_id = Role::where('role', 'editor')->first()->id;
        $user->save();

        return redirect()->back();
    }

    public function roleUser($id) {
        $this->authorize('admin', Auth::user());
        $user = User::find($id)->first();

        $user->role_id = Role::where('role', 'user')->first()->id;
        $user->save();

        return redirect()->back();
    }
}
