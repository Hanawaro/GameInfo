<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\PhotoRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class SettingsController extends Controller
{
    public function index() {
        return view('settings');
    }

    public function changeEmail(EmailRequest $request) {

        Auth::user()->update(['email'=>  $request->post('email')]);

        $request->session()->flash('success', true);
        return redirect()->back();
    }

    public function changePhoto(PhotoRequest $request) {

        $value = $request->file('file')->store('users');

        $user = Auth::user();
        if (!empty($user->photo))
            Storage::delete($user->photo);

        $user->photo = $value;
        $user->save();

        $request->session()->flash('success', true);
        return redirect()->back();
    }

    public function changePassword(PasswordRequest $request) {

        Auth::user()->update(['password'=> Hash::make($request->post('new_password'))]);

        $request->session()->flash('success', true);
        return redirect()->back();
    }
}
