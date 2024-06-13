<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //ini logika untuk login, form dia akan di arahkan menuju view auth.login
    public function showLoginForm()
    {
        return view('auth.login');
    }


    // ini logika jika ingin login, menggunakan email dan username secara bersamaan
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([$loginType => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('mahasiswa');
        }

        return back()
            ->withErrors([
                'login' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('login');
    }

    // ini logika untuk logout tanpa menggunkan middleware
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // ini logika jika ingin login menggunakan email saja
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('mahasiswa');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }

    // ---------------------------------------------------------------------------------

    // ini logika jika ingin login menggunakan username saja
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'name' => ['required'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('mahasiswa');
    //     }

    //     return back()->withErrors([
    //         'name' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('name');
    // }

    // ---------------------------------------------------------------------------------

    //     // Menangani proses logout menggunakan middleware
    //     public function logout(Request $request)
    //     {
    //         // Periksa apakah permintaan menggunakan metode POST
    //         if (!$request->isMethod('post')) {
    //             abort(404);
    //             // atau, jika Anda ingin memberikan pesan error kustom:
    //             // return redirect()->back()->withErrors(['message' => 'Page not found']);
    //         }

    //         Auth::logout();
    //         $request->session()->invalidate();
    //         $request->session()->regenerateToken();

    //         return redirect('/login');
    //     }
}

// php artisan make:controller Auth/LoginController (untuk membuat folder auth dan LoginController secara bersama)
// php artisan make:model User -m (untuk membuat file model dan migarte)
