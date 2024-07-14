<?php

namespace App\Http\Controllers;

use App\Models\ModelOutlet;
use App\Models\ModelPengiriman;
use App\Models\ModelSupir;
use App\Models\ModelTruk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class pengirimanController extends Controller
{
    public function index()
    {
        $tb_pengiriman = ModelPengiriman::all();
        $tb_outlet = ModelOutlet::get();
        $tb_truk = ModelTruk::all();
        $tb_supir = ModelSupir::all();
        return view('pengiriman.pengiriman', compact('tb_pengiriman', 'tb_outlet', 'tb_truk', 'tb_supir'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required',
            'id_truk' => 'required',
            'id_supir' => 'required',
            'status_pengiriman' => 'required',
            'tgl_pengiriman' => 'required',
        ]);

        ModelPengiriman::create([
            'id_outlet' => $request->id_outlet,
            'id_truk' => $request->id_truk,
            'id_supir' => $request->id_supir,
            'nama_outlet' => ModelOutlet::find($request->id_outlet)->nama_outlet,
            'nomor_plat' => ModelTruk::find($request->id_truk)->nomor_plat,
            'nama_supir' => ModelSupir::find($request->id_supir)->nama_supir,
            'status_pengiriman' => $request->status_pengiriman,
            'tgl_pengiriman' => $request->tgl_pengiriman,
        ]);

        return redirect()->route('pengiriman')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $tb_pengiriman = ModelPengiriman::find($id);
        $tb_outlet = ModelOutlet::all();
        $tb_truk = ModelTruk::all();
        $tb_supir = ModelSupir::all();
        return view('pengiriman.pengiriman-edit', compact('tb_pengiriman', 'tb_outlet', 'tb_truk', 'tb_supir'));
    }

    public function update(Request $request, $id)
    {
        $tb_pengiriman = ModelPengiriman::find($id);
        $tb_pengiriman->id_outlet = $request->id_outlet;
        $tb_pengiriman->id_truk = $request->id_truk;
        $tb_pengiriman->id_supir = $request->id_supir;
        $tb_pengiriman->update($request->all());
        return redirect()->route('pengiriman')->with('success', 'Data Pengiriman Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $data_pengiriman = ModelPengiriman::find($id)->delete();
        return redirect()->route('pengiriman');
    }

    public function exportpdf()
    {
        $tb_pengiriman  = ModelPengiriman::all();
        $pdf = Pdf::loadview('pengiriman.pengiriman-pdf', compact('tb_pengiriman'));
        return $pdf->stream('pengiriman.pdf');
    }
}
