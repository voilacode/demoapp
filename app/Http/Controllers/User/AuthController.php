<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display the login view for user.
     *
     * @return \Illuminate\View\View
     */
    public static function login(Request $request)
    {
        $user = Auth::user();
        $alert = $request->get('alert');
        $data = $request->all();
        if (count($data) > 0) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
            } else {
                $alert = "Invalid Credentials";
            }
        }

        if ($user == null)
            return view('user.auth.login')->with('alert', $alert); //->with('alert', $alert);
        else
            return redirect()->route('auth.profile');
    }

    public function profile(Request $request)
    {
        $user = Auth::user();

        if ($user)
            return view('user.auth.dashboard')->with('user', $user);
        else
            abort('403', 'User not logged in');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
