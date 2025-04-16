<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function show(String $id)
    {
        // Cek apakah file 'cart.json' ada
        if (Storage::exists('data/cart.json')) {
            // Ambil data dari file 'cart.json'
            $cartData = Storage::get('data/cart.json');
            // Dekode data menjadi array
            $cartItems = json_decode($cartData, true);
        } else {
            // Jika file 'cart.json' tidak ditemukan, inisialisasi $cartItems sebagai array kosong
            $cartItems = [];
        }

        // Pass the cart items data and the $id parameter to the view
        return view('cart', ['cartItems' => $cartItems, 'idChart' => $id]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $currentTimeUTC = Carbon::now('Asia/Jakarta');

            // Create Transaksi
            $transaksi = Transaksi::create([
                'nama' => $request->input('nama'),
                'status' => $request->input('status'),
                'jumlah' => $request->input('jumlah'),
                'total' => $request->input('total'),
                'catatan' => $request->input('catatan'),
                'created_at' => $currentTimeUTC,
                'updated_at' => $currentTimeUTC
            ]);

            // Create DetailTransaksi
            $detailTransaksiData = $request->input('detail_transaksi');
            foreach ($detailTransaksiData as $detail) {
                DetailTransaksi::create([
                    'kode_transaksi' => $transaksi->kode_transaksi,
                    'nama_product' => $detail['nama_product'],
                    'jumlah' => $detail['jumlah'],
                    'harga' => $detail['harga'],
                    'total' => $detail['total'],
                    'kode_product' => $detail['kode_product'],
                    'catatan' => $detail['catatan'] ?? NULL,
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'Transaction successfully created'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error message for debugging
            Log::error('Transaction creation failed: ' . $e->getMessage());
            return response()->json(['message' => 'Transaction creation failed', 'error' => $e->getMessage()], 500);
        }
    }
}
