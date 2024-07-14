<?php

namespace App\Http\Controllers;

use App\Models\ModelPegawai;
use App\Models\ModelPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        $username = Cookie::get('username'); // Ambil username dari cookie
        return view('login', compact('username'));
    }

    // Logika login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember'); // Check if remember is set

        // Cek pengguna di database
        $user = ModelPengguna::where('username', $credentials['username'])->first();
        if ($user) {
            // Cek apakah password cocok
            if (Hash::check($credentials['password'], $user->password)) {
                // Password cocok
                if (Auth::attempt($credentials, $remember)) {
                    if ($remember) {
                        // Simpan username di cookie selama 1 minggu
                        Cookie::queue('username', $credentials['username'], 10080);
                    } else {
                        // Hapus cookie username jika tidak ingin diingat
                        Cookie::queue(Cookie::forget('username'));
                    }

                    return redirect()->intended('/dashboard');
                } else {
                    return redirect()->route('login')->with('error', 'Invalid credentials!');
                }
            } else {
                return redirect()->route('login')->with('error', 'Invalid password!');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username not found!');
        }
    }

    // Logika logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Tampilkan form registrasi
    public function showRegistrationForm()
    {
        $pegawai = ModelPegawai::all(); // Mengambil semua data pegawai
        return view('register', compact('pegawai'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required',
            'email' => 'required|email|unique:tb_pengguna,email',
            'username' => 'required|unique:tb_pengguna,username',
            'password' => 'required|min:8',
            'hak_akses' => 'required',
        ]);

        ModelPengguna::create([
            'id_pegawai' => $request->id_pegawai,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'hak_akses' => $request->hak_akses,
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully!');
    }
}
