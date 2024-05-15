<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        // Validasi request jika diperlukan
        $request->validate([
            // Atur aturan validasi jika diperlukan
        ]);

        // Simpan data pesanan ke database menggunakan model Pesanan
        $pesanan = new Pesanan();
        $pesanan->nama = $request->input('nama');
        $pesanan->jumlah = $request->input('jumlah');
        $pesanan->total = $request->input('total');
        $pesanan->status = $request->input('status');
        $pesanan->update = $request->input('update');
        $pesanan->notes = $request->input('notes');
        $pesanan->save();

        return response()->json(['message' => 'Order placed successfully']);
    }
}
