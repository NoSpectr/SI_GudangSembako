<?php

namespace App\Http\Controllers;

use App\Models\ModelKategori;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class kategoriController extends Controller
{
    public function index()
    {
        $tb_kategori = ModelKategori::get(); // Mengambil semua data barang
        return view('kategori.kategori', compact('tb_kategori')); // Mengirim data ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        ModelKategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = ModelKategori::find($id);
        return view('kategori.kategori-edit', compact('kategori'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        ModelKategori::find($request->id_kategori)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $tb_kategori = ModelKategori::find($id)->delete();
        return redirect()->route('kategori');
    }
    public function exportpdf()
    {
        $kategori = ModelKategori::all();
        $pdf = Pdf::loadview('kategori.kategori-pdf', compact('kategori'));
        return $pdf->stream('kategori.pdf');
    }
}
