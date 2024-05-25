<?php

namespace App\Http\Controllers;

use App\Models\ModelGudang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class gudangController extends Controller
{
    public function index()
    {
        $gudang = ModelGudang::get(); // Mengambil semua data barang
        return view('gudang.gudang', compact('gudang')); // Mengirim data ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'alamat_gudang' => 'required',
            'kapasitas_gudang' => 'required',
        ]);

        ModelGudang::create([
            'nama_gudang' => $request->nama_gudang,
            'alamat_gudang' => $request->alamat_gudang,
            'kapasitas_gudang' => $request->kapasitas_gudang,
        ]);

        return redirect()->route('gudang')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $gudang = ModelGudang::find($id);
        return view('gudang.gudang-edit', compact('gudang'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'alamat_gudang' => 'required',
            'kapasitas_gudang' => 'required',
        ]);

        ModelGudang::find($request->id_gudang)->update([
            'nama_gudang' => $request->nama_gudang,
            'alamat_gudang' => $request->alamat_gudang,
            'kapasitas_gudang' => $request->kapasitas_gudang,
        ]);

        return redirect()->route('gudang')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $tb_gudang = ModelGudang::find($id)->delete();
        return redirect()->route('gudang');
    }
    public function exportpdf()
    {
        $gudang = ModelGudang::all();
        $pdf = Pdf::loadview('gudang.gudang-pdf', compact('gudang'));
        return $pdf->stream('gudang.pdf');
    }
}
