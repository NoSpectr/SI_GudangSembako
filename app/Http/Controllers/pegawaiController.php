<?php

namespace App\Http\Controllers;

use App\Models\ModelPegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class pegawaiController extends Controller
{
    public function index()
    {
        $tb_pegawai = ModelPegawai::get(); // Mengambil semua data pegawai
        return view('pegawai.pegawai', compact('tb_pegawai')); // Mengirim data ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'alamat_pegawai' => 'required',
            'telp_pegawai' => 'required',
        ]);

        ModelPegawai::create($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $pegawai = ModelPegawai::find($id);
        return view('pegawai.pegawai-edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'alamat_pegawai' => 'required',
            'telp_pegawai' => 'required',
        ]);

        ModelPegawai::find($id)->update([
            'nama_pegawai' => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
            'alamat_pegawai' => $request->alamat_pegawai,
            'telp_pegawai' => $request->telp_pegawai,
        ]);

        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        ModelPegawai::find($id)->delete();
        return redirect()->route('pegawai');
    }

    public function exportpdf()
    {
        $pegawai = ModelPegawai::all();
        $pdf = Pdf::loadview('pegawai.pegawai-pdf', compact('pegawai'));
        return $pdf->stream('pegawai.pdf');
    }
}
