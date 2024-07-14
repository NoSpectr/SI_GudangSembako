<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Outlet;
use App\Models\Supir;
use App\Models\Gudang;
use App\Models\ModelBarang;
use App\Models\ModelGudang;
use App\Models\ModelOutlet;
use App\Models\ModelSupir;
use Illuminate\Database\Eloquent\Model;

class DashboardController extends Controller
{
    public function getData()
    {
        $barangCount = ModelBarang::count();
        $outletCount = ModelOutlet::count();
        $supirCount = ModelSupir::count();
        $gudangCount = ModelGudang::count();

        return response()->json([
            'barang_count' => $barangCount,
            'outlet_count' => $outletCount,
            'supir_count' => $supirCount,
            'gudang_count' => $gudangCount,
        ]);
    }
}
