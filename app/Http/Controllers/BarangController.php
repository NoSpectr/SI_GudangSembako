<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ModelBarang;
use App\Models\ModelKategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $tb_barang = ModelBarang::all();
        $tb_kategori = ModelKategori::all();
        return view('barang.barang', compact('tb_barang', 'tb_kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        ModelBarang::create([
            'id_kategori' => $request->id_kategori,
            'nama_barang' => $request->nama_barang,
            'nama_kategori' => ModelKategori::find($request->id_kategori)->nama_kategori,
            'satuan_barang' => $request->satuan_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);

        return redirect()->route('barang')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $barang = ModelBarang::find($id);
        $kategori = ModelKategori::all();
        return view('barang.barang-edit', compact('barang', 'kategori'));
    }
    public function show()
    {
        $barang = ModelBarang::all();
        $kategori = ModelKategori::all();
        return view('barang.barang-create', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $tb_barang = ModelBarang::find($id);
        $tb_barang->id_kategori = $request->id_kategori;
        $tb_barang->update($request->all());
        return redirect()->route('barang')->with('success', 'Data Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        ModelBarang::destroy($id); // Menghapus data barang berdasarkan id
        return redirect()->route('barang')->with('success', 'Data Berhasil Dihapus!');
    }
    public function exportpdf()
    {
        $tb_barang = ModelBarang::all();
        $pdf = Pdf::loadview('barang.barang-pdf', compact('tb_barang'));
        return $pdf->stream('barang.pdf');
    }
}
