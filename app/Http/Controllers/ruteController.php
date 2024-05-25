<?php

namespace App\Http\Controllers;

use App\Models\ModelGudang;
use App\Models\ModelRute;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ruteController extends Controller
{
    public function index()
    {
        $tb_gudang = ModelGudang::all();
        $tb_rute = ModelRute::all(); // Mengambil semua data rute
        return view('rute.rute', compact('tb_rute', 'tb_gudang')); // Mengirim data ke view
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_gudang' => 'required',
            'daftar_titik' => 'required',
        ]);

        ModelRute::create([
            'id_gudang' => $request->id_gudang,
            'nama_gudang' => ModelGudang::find($request->id_gudang)->nama_gudang,
            'daftar_titik' => $request->daftar_titik,
        ]);

        return redirect()->route('rute')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $tb_rute = ModelRute::find($id);
        $tb_gudang = ModelGudang::all();
        return view('rute.rute-edit', compact('tb_rute', 'tb_gudang', 'id'));
    }
    public function update(Request $request, $id)
    {
        $tb_rute = ModelRute::find($id);
        $tb_rute->id_gudang = $request->id_gudang;
        $tb_rute->update($request->all());
        return redirect()->route('rute')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $data_rute = ModelRute::find($id)->delete();
        return redirect()->route('rute');
    }
    public function exportpdf()
    {
        $data_rute = ModelRute::all();
        $pdf = Pdf::loadview('rute.rute-pdf', compact('data_rute'));
        return $pdf->stream('rute.pdf');
    }
}
