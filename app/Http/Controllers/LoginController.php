<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
use App\Models\Murid;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('landingpage.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {

            $user = users::where('username', $request->username)->first();
            // $request->session()->put('role', $user->role);
            $request->session()->regenerate();
            $request->session()->put('id', $user->id);
            $request->session()->put('role', $user->role);
            if ($user->role == 'Murid') {
                $request->session()->put('kelas_id', Murid::where('user_id', $user->id)->get()[0]->kelas_id);
            }
            return redirect()->intended('/home');
        }
        return redirect()->back()
            ->withErrors('Your Input Is Error!');
    }

    public function dashboard()
    {
        if (session()->has('_token')) {
            return view('landingpage.home');
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
