<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginPost(Request $request)
    {
        if (Auth::attempt(['uid' => $request->useremail, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = User::where('uid', $request->useremail)->first();
            $request->session()->put('user', $user);

            return redirect('/');
        }

        if (Auth::attempt(['email' => $request->useremail, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = User::where('email', $request->useremail)->first();
            $request->session()->put('user', $user);

            return redirect('/');
        }

        return back()->with('error', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
