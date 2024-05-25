<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\gudangController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\outletController;
use App\Http\Controllers\pengirimanController;
use App\Http\Controllers\ruteController;
use App\Http\Controllers\stokController;
use App\Http\Controllers\supirController;
use App\Http\Controllers\trukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route Count Dashboard
Route::get('dashboard/data', 'DashboardController@getData')->name('dashboard.data');

// Route Data Barang
Route::get('barang/barang', [barangController::class, 'index'])->name('barang');
Route::get('/barang-create', function () {
    return view('barang/barang-create');
})->name('barang-create');
Route::post('/barang-store', [barangController::class, 'store'])->name('barang.store');
Route::get('/barang-edit/{id}', [barangController::class, 'edit'])->name('barang-edit');
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::GET('/barang-destroy/{id}', [barangController::class, 'destroy'])->name('barang-destroy');
Route::get('/barang-pdf', [barangController::class, 'exportpdf']);

//Route Kategori Barang
route::get('kategori/kategori', [kategoriController::class, 'index'])->name('kategori');
Route::get('/kategori-create', function () {
    return view('kategori/kategori-create');
})->name('kategori-create');
Route::post('/kategori-store', [kategoriController::class, 'store'])->name('kategori.store');
Route::GET('/kategori-edit/{id}', [kategoriController::class, 'edit'])->name('kategori-edit');
Route::POST('/kategori-update', [kategoriController::class, 'update'])->name('kategori.update');
Route::GET('/kategori-destroy/{id}', [kategoriController::class, 'destroy'])->name('kategori-destroy');
Route::get('/kategori-pdf', [kategoriController::class, 'exportpdf']);

//Route Stok Barang
Route::get('stok/stok', [stokController::class, 'index'])->name('stok');
Route::get('/stok-create', function () {
    return view('stok/stok-create');
})->name('stok-create');
Route::post('/stok-store', [stokController::class, 'store'])->name('stok.store');
Route::GET('/stok-edit/{id}', [stokController::class, 'edit'])->name('stok-edit');
Route::put('/stok/{id}/update', [stokController::class, 'update'])->name('stok.update');
Route::GET('/stok-destroy/{id}', [stokController::class, 'destroy'])->name('stok-destroy');
Route::get('/stok-pdf', [stokController::class, 'exportpdf']);


//Route Data Gudang
Route::get('gudang/gudang', [gudangController::class, 'index'])->name('gudang');
Route::get('/gudang-create', function () {
    return view('gudang/gudang-create');
})->name('gudang-create');
Route::post('/gudang-store', [gudangController::class, 'store'])->name('gudang.store');
Route::get('/gudang-edit/{id}', [gudangController::class, 'edit'])->name('gudang-edit');
Route::post('/gudang-update', [gudangController::class, 'update'])->name('gudang.update');
Route::GET('/gudang-destroy/{id}', [gudangController::class, 'destroy'])->name('gudang-destroy');
Route::get('/gudang-pdf', [gudangController::class, 'exportpdf']);

//Route Data Outlet
route::get('outlet/outlet', [outletController::class, 'index'])->name('outlet');
Route::get('/outlet-create', function () {
    return view('outlet/outlet-create');
})->name('outlet-create');
Route::post('/outlet-store', [outletController::class, 'store'])->name('outlet.store');
Route::GET('/outlet-edit/{id}', [outletController::class, 'edit'])->name('outlet-edit');
Route::POST('/outlet-update', [outletController::class, 'update'])->name('outlet.update');
Route::GET('/outlet-destroy/{id}', [App\Http\Controllers\outletController::class, 'destroy'])->name('outlet-destroy');
Route::get('/outlet-pdf', [outletController::class, 'exportpdf']);

//Route Data Truk
route::get('truk/truk', [trukController::class, 'index'])->name('truk');
Route::get('/truk-create', function () {
    return view('truk/truk-create');
})->name('truk-create');
Route::post('/truk-store', [trukController::class, 'store'])->name('truk.store');
Route::GET('/truk-edit/{id}', [trukController::class, 'edit'])->name('truk-edit');
Route::POST('/truk-update', [trukController::class, 'update'])->name('truk.update');
Route::GET('/truk-destroy/{id}', [trukController::class, 'destroy'])->name('truk-destroy');
Route::get('/truk-pdf', [trukController::class, 'exportpdf']);

//Route Data Supir
Route::get('supir/supir', [supirController::class, 'index'])->name('supir');
Route::get('/supir-create', function () {
    return view('supir/supir-create');
})->name('supir-create');
Route::post('/supir-store', [supirController::class, 'store'])->name('supir.store');
Route::GET('/supir-edit/{id}', [supirController::class, 'edit'])->name('supir-edit');
Route::put('/supir/update/{id}', [supirController::class, 'update'])->name('supir.update');
Route::GET('/supir-destroy/{id}', [supirController::class, 'destroy'])->name('supir-destroy');
Route::get('/supir-pdf', [supirController::class, 'exportpdf']);

//Route Data Rute
Route::get('rute/rute', [ruteController::class, 'index'])->name('rute');
Route::get('/rute-create', function () {
    return view('rute/rute-create');
})->name('rute-create');
Route::post('/rute-store', [ruteController::class, 'store'])->name('rute.store');
Route::GET('/rute-edit/{id}', [ruteController::class, 'edit'])->name('rute-edit');
Route::put('/rute/update/{id}', [ruteController::class, 'update'])->name('rute.update');
Route::GET('/rute-destroy/{id}', [ruteController::class, 'destroy'])->name('rute-destroy');
Route::get('/rute-pdf', [ruteController::class, 'exportpdf']);

//Route Data Jadwal Pengiriman
Route::get('jadwal/jadwal', [jadwalController::class, 'index'])->name('jadwal');
Route::get('/jadwal-create', function () {
    return view('jadwal/jadwal-create');
})->name('jadwal-create');
Route::post('/jadwal-store', [jadwalController::class, 'store'])->name('jadwal.store');
Route::GET('/jadwal-edit/{id}', [jadwalController::class, 'edit'])->name('jadwal-edit');
Route::put('/jadwal/update/{id}', [jadwalController::class, 'update'])->name('jadwal.update');
Route::GET('/jadwal-destroy/{id}', [jadwalController::class, 'destroy'])->name('jadwal-destroy');
Route::get('/jadwal-pdf', [jadwalController::class, 'exportpdf']);

//Route Data Pengiriman
Route::get('pengiriman/pengiriman', [pengirimanController::class, 'index'])->name('pengiriman');
Route::get('/pengiriman-create', function () {
    return view('pengiriman/pengiriman-create');
})->name('pengiriman-create');
Route::post('/pengiriman-store', [pengirimanController::class, 'store'])->name('pengiriman.store');
Route::GET('/pengiriman-edit/{id}', [pengirimanController::class, 'edit'])->name('pengiriman-edit');
Route::put('/pengiriman/update/{id}', [pengirimanController::class, 'update'])->name('pengiriman.update');
Route::GET('/pengiriman-destroy/{id}', [pengirimanController::class, 'destroy'])->name('pengiriman-destroy');
Route::get('/pengiriman-pdf', [pengirimanController::class, 'exportpdf']);
