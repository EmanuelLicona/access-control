<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'remember' => ''
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->remember ?? false;

        if (auth()->attempt($credentials, $remember)) {

            $user = auth()->user();
            if ($user->is_admin) {
                // Authentication passed...
                $request->session()->regenerate();
                return redirect()->route('home');
            } else {
                auth()->logout();
                return back()->withErrors('No tienes permisos para acceder');
            }
        }

        return back()->withErrors('Las credenciales no son correctas');
    }

    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
