<?php

namespace App\Http\Controllers;

use App\Models\ModelGudang;
use App\Models\ModelBarang;
use App\Models\ModelStok;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class stokController extends Controller
{
    public function index()
    {
        $tb_gudang = ModelGudang::all();
        $tb_barang = ModelBarang::all();
        $tb_stokBarang = ModelStok::all(); // Mengambil semua data rute
        return view('stok.stok', compact('tb_barang', 'tb_gudang', 'tb_stokBarang')); // Mengirim data ke view
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_gudang' => 'required',
            'jumlah_stok' => 'required',
            'tgl_masuk' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        ModelStok::create([
            'id_barang' => $request->id_barang,
            'id_gudang' => $request->id_gudang,
            'nama_barang' => ModelBarang::find($request->id_barang)->nama_barang,
            'nama_gudang' => ModelGudang::find($request->id_gudang)->nama_gudang,
            'jumlah_stok' => $request->jumlah_stok,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa,
        ]);
        return redirect()->route('stok')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $tb_stokBarang = ModelStok::find($id);
        $tb_gudang = ModelGudang::all();
        $tb_barang = ModelBarang::all();
        return view('stok.stok-edit', compact('tb_stokBarang', 'tb_gudang', 'tb_barang'));
    }
    public function update(Request $request, $id)
    {
        $tb_stokBarang = ModelStok::find($id);
        $tb_stokBarang->id_gudang = $request->id_gudang;
        $tb_stokBarang->id_barang = $request->id_barang;
        $tb_stokBarang->update($request->all());
        return redirect()->route('stok')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $data_stok = ModelStok::find($id)->delete();
        return redirect()->route('stok');
    }
    public function exportpdf()
    {
        $data_stok = ModelStok::all();
        $pdf = Pdf::loadview('stok.stok-pdf', compact('data_stok'));
        return $pdf->stream('stok.pdf');
    }
}
