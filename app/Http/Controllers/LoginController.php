<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function checkLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $u = User::where(['email' => $email, 'password' => $password])->first();
        if ($u) {
            // Store login session
            session(['is_admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['Invalid credentials']);
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect()->route('login');
    }
}
