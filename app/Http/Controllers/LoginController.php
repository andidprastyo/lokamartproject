<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */   

    # Fungsi login digunakan untuk memvalidasi email dan password yang digunakan oleh user untuk login dan mendapat session
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admincus');
            }
 
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    # Fungsi logout digunakan untuk mengakhiri session sehingga user terlogout
    public function logout(Request $request): RedirectResponse
    { 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect()->route('home');
    }
}