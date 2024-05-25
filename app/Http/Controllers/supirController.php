<?php

namespace App\Http\Controllers;

use App\Models\ModelGudang;
use App\Models\ModelRute;
use App\Models\ModelSupir;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class supirController extends Controller
{
    public function index()
    {
        $tb_rute = ModelRute::all();
        $tb_supir = ModelSupir::all();
        $tb_gudang = ModelGudang::all();
        return view('supir.supir', compact('tb_supir', 'tb_rute','tb_gudang')); // Mengirim data ke view
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_rute' => 'required',
            'nama_supir' => 'required',
            'alamat_supir' => 'required',
            'telp_supir' => 'required',
        ]);

        $supir = ModelSupir::create([
            'id_rute' => $request->id_rute,
            'nama_rute' => ModelRute::find($request->id_rute)->nama_gudang,
            'nama_supir' => $request->nama_supir,
            'alamat_supir' => $request->alamat_supir,
            'telp_supir' => $request->telp_supir,
        ]);

        return redirect()->route('supir')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $tb_supir = ModelSupir::find($id);
        $tb_gudang = ModelGudang::all();
        return view('supir.supir-edit', compact('tb_supir', 'tb_gudang'));
    }
    public function update(Request $request, $id)
    {
        $tb_supir = ModelSupir::find($id);
        $tb_supir->id_rute = $request->id_rute;
        $tb_supir->nama_supir = $request->nama_supir;
        $tb_supir->alamat_supir = $request->alamat_supir;
        $tb_supir->telp_supir = $request->telp_supir;
        $tb_supir->save();

        return redirect()->route('supir')->with('success', 'Data Berhasil Di Update!');
    }


    public function destroy($id)
    {
        $data_supir = ModelSupir::find($id)->delete();
        return redirect()->route('supir');
    }
    public function exportpdf()
    {
        $data_supir = ModelSupir::all();
        $pdf = Pdf::loadview('supir.supir-pdf', compact('data_supir'));
        return $pdf->stream('supir.pdf');
    }
}
