<?php

namespace App\Http\Controllers\MobileAPI;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getDataProduct() {
        try {
            // Ambil semua data dari model
            $data = Product::all();

            // Jika data ditemukan, kembalikan respons JSON
            if ($data->count() > 0) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data retrieved successfully',
                    'data' => $data
                ], 200);
            } else {
                // Jika tidak ada data, kembalikan pesan kosong
                return response()->json([
                    'status' => 'fail',
                    'message' => 'No data found',
                    'data' => []
                ], 200);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
