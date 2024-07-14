<?php

namespace App\Http\Controllers;

use App\Models\ModelPegawai;
use App\Models\ModelPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class penggunaController extends Controller
{
    public function index()
    {
        $pengguna = ModelPengguna::with('pegawai')->get();
        return view('pengguna.pengguna', compact('pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required',
            'email' => 'required|email|unique:tb_pengguna,email',
            'username' => 'required|unique:tb_pengguna,username',
            'password' => 'required|min:8',
            'hak_akses' => 'required',
        ]);

        $pengguna = new ModelPengguna([
            'id_pegawai' => $request->id_pegawai,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'hak_akses' => $request->hak_akses,
        ]);

        $pengguna->save();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengguna = ModelPengguna::findOrFail($id);
        $pegawai = ModelPegawai::all();
        return view('pengguna.pengguna-edit', compact('pengguna', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pegawai' => 'required',
            'email' => 'required|email|unique:tb_pengguna,email,' . $id,
            'username' => 'required|unique:tb_pengguna,username,' . $id,
            'hak_akses' => 'required',
        ]);
        $pengguna = ModelPengguna::findOrFail($id);
        $data = $request->except('password');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $pengguna->update($data);
        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil diperbarui!');
    }
}
