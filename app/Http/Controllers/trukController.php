<?php

namespace App\Http\Controllers;

use App\Models\ModelTruk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class trukController extends Controller
{
    public function index()
    {
        $tb_truk = ModelTruk::get(); // Mengambil semua data truk
        return view('truk.truk', compact('tb_truk')); // Mengirim data ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_plat' => 'required',
            'kapasitas_truk' => 'required',
            'kondisi_truk' => 'required',
        ]);

        ModelTruk::create([
            'nomor_plat' => $request->nomor_plat,
            'kapasitas_truk' => $request->kapasitas_truk,
            'kondisi_truk' => $request->kondisi_truk,
        ]);

        return redirect()->route('truk')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $truk = ModelTruk::find($id);
        return view('truk.truk-edit', compact('truk'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nomor_plat' => 'required',
            'kapasitas_truk' => 'required',
            'kondisi_truk' => 'required',
        ]);

        ModelTruk::find($request->id_truk)->update([
            'nomor_plat' => $request->nomor_plat,
            'kapasitas_truk' => $request->kapasitas_truk,
            'kondisi_truk' => $request->kondisi_truk,
        ]);

        return redirect()->route('truk')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $tb_truk = ModelTruk::find($id)->delete();

        return redirect()->route('truk');
    }

    public function exportpdf()
    {
        $truk = ModelTruk::all();
        $pdf = Pdf::loadview('truk.truk-pdf', compact('truk'));
        return $pdf->stream('truk.pdf');
    }
}
