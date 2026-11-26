<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function loginView()
    {
        return view('login');
    }

    // Proses login


public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
        'password.string' => 'Password tidak valid.',
    ]);

    try {
        // Memeriksa email dan password
        if (!Auth::attempt($credentials)) {
            throw new Exception('Invalid Credential');
        }

        // Mengambil user yang berhasil login
        $user = Auth::user();

        // Regenerasi session
        $request->session()->regenerate();

        // Redirect setelah login berhasil
        return redirect('/product')
            ->with('success', 'Login berhasil.');

    } catch (Exception $e) {

        // Jika login gagal
        return back()
            ->withInput($request->except('password'))
            ->with('error', 'Email atau Password Anda Salah!');
    }
}



    // Menampilkan halaman register
    public function registerView()
    {
        return view('register');
    }

    // Proses register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($validated);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Berhasil logout.');
    }
}
