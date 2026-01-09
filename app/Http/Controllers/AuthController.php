<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* =======================
     * REGISTER
     * ======================= */
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        // 2. Buat User Siswa
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'siswa' // Otomatis menjadi siswa saat daftar
        ]);

        // 3. Tambahkan baris ini agar otomatis login setelah daftar
        Auth::login($user);

        // 4. Langsung arahkan ke dashboard siswa
        return redirect('/dashboard-siswa')
            ->with('success', 'Registrasi berhasil! Selamat datang di PSB SMK Jaya.');
    }

    /* =======================
     * LOGIN
     * ======================= */
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // Validasi input login
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Coba proses autentikasi
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // LOGIKA PEMISAH ROLE
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            // Default redirect untuk siswa
            return redirect()->intended('/dashboard-siswa');
        }

        // Jika gagal login
        return back()
            ->with('error', 'Email atau password salah')
            ->withInput();
    }

    /* =======================
     * LOGOUT
     * ======================= */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}