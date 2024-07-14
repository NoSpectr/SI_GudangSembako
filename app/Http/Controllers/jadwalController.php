<?php

namespace App\Http\Controllers;

use App\Models\ModelGudang;
use App\Models\ModelJadwal;
use App\Models\ModelOutlet;
use App\Models\ModelSupir;
use App\Models\ModelTruk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class jadwalController extends Controller
{
    public function index()
    {
        $tb_jadwal = ModelJadwal::all();
        $tb_outlet = ModelOutlet::get();
        $tb_rute = ModelOutlet::all();
        $tb_supir = ModelSupir::all();
        return view('jadwal.jadwal', compact('tb_jadwal', 'tb_outlet', 'tb_rute', 'tb_supir'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required',
            'id_truk' => 'required',
            'id_supir' => 'required',
            'jadwal' => 'required',
        ]);

        ModelJadwal::create([
            'id_outlet' => $request->id_outlet,
            'id_truk' => $request->id_truk,
            'id_supir' => $request->id_supir,
            'nama_outlet' => ModelOutlet::find($request->id_outlet)->nama_outlet,
            'nomor_plat' => ModelTruk::find($request->id_truk)->nomor_plat,
            'nama_supir' => ModelSupir::find($request->id_supir)->nama_supir,
            'jadwal' => $request->jadwal,
        ]);

        return redirect()->route('jadwal')->with('success', 'Data Jadwal Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $tb_jadwal = ModelJadwal::find($id);
        $tb_outlet = ModelOutlet::all();
        $tb_truk = ModelTruk::all();
        $tb_supir = ModelSupir::all();
        return view('jadwal.jadwal-edit', compact('tb_jadwal', 'tb_outlet', 'tb_truk', 'tb_supir'));
    }

    public function update(Request $request, $id)
    {
        $tb_jadwal = ModelJadwal::find($id);
        $tb_jadwal->id_outlet = $request->id_outlet;
        $tb_jadwal->id_truk = $request->id_truk;
        $tb_jadwal->id_supir = $request->id_supir;
        $tb_jadwal->update($request->all());

        return redirect()->route('jadwal')->with('success', 'Data Jadwal Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $tb_jadwal = ModelJadwal::find($id)->delete();
        return redirect()->route('jadwal');
    }
    public function exportpdf()
    {
        $tb_jadwal = ModelJadwal::all();
        $pdf = Pdf::loadview('jadwal.jadwal-pdf', compact('tb_jadwal'));
        return $pdf->stream('jadwal.pdf');
    }
}
