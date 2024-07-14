<?php

namespace App\Http\Controllers;

use App\Models\ModelOutlet;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class outletController extends Controller
{
    public function index()
    {
        $tb_outlet = ModelOutlet::get(); // Mengambil semua data outlet
        return view('outlet.outlet', compact('tb_outlet')); // Mengirim data ke view
    }

    public function store(Request $request)
    {
        ModelOutlet::create($request->all());
        return redirect()->route('outlet')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $outlet = ModelOutlet::find($id);
        return view('outlet.outlet-edit', compact('outlet'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama_outlet' => 'required',
            'alamat_outlet' => 'required',
            'no_telp' => 'required',
        ]);

        ModelOutlet::find($request->id_outlet)->update([
            'nama_outlet' => $request->nama_outlet,
            'alamat_outlet' => $request->alamat_outlet,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('outlet')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $tb_outlet = ModelOutlet::find($id)->delete();

        return redirect()->route('outlet');
    }
    public function exportpdf()
    {
        $outlet = ModelOutlet::all();
        $pdf = Pdf::loadview('outlet.outlet-pdf', compact('outlet'));
        return $pdf->stream('outlet.pdf');
    }
}
