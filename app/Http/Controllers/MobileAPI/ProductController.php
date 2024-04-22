<?php

namespace App\Http\Controllers\MobileAPI;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getDataProduct($jenis) {
        try {
            // Ambil semua data dari model
            $data = Product::where('jenis_product', $jenis)->get();

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

    public function storeProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_product' => 'required',
            'deskripsi' => 'required',
            'stock_product' => 'required',
            'harga_product' => 'required',
            'jenis_product' => 'required',
            'gambar_product'  => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([ 'status' => 'fail', 'message' => $validator->errors() ], 400);
        }

        $createproduct = Product::create([
            'nama_product' => $request->input('nama_product'),
            'deskripsi' => $request->input('deskripsi'),
            'stock_product' => $request->input('stock_product'),
            'harga_product' => $request->input('harga_product'),
            'jenis_product' => $request->input('jenis_product'),
            'gambar_product' => $request->input('gambar_product'),
        ]);

        return response()->json(['status' => 'success', 'message' => 'Study created successfully', 'data' => $createproduct], 200);
    }

    public function updateProduct(Request $request, $kodeProduct) {
        $validator = Validator::make($request->all(), [
            'nama_product' => 'required',
            'deskripsi' => 'required',
            'stock_product' => 'required',
            'harga_product' => 'required',
            'jenis_product' => 'required',
            'gambar_product'  => 'nullable'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'message' => $validator->errors()], 400);
        }
    
        $product = Product::find($kodeProduct);
    
        if (!$product) {
            return response()->json(['status' => 'fail', 'message' => 'Product not found'], 404);
        }
    
        $product->nama_product = $request->input('nama_product');
        $product->deskripsi = $request->input('deskripsi');
        $product->stock_product = $request->input('stock_product');
        $product->harga_product = $request->input('harga_product');
        $product->jenis_product = $request->input('jenis_product');
        $product->gambar_product = $request->input('gambar_product');
    
        $product->save();
    
        return response()->json(['status' => 'success', 'message' => 'Product updated successfully', 'data' => $product], 200);
    }

    public function destroyProduct($id) {
        // Cari produk berdasarkan ID
    $product = Product::find($id);

    // Periksa apakah produk ditemukan
    if (!$product) {
        return response()->json(['status' => 'fail', 'message' => 'Product not found'], 404);
    }

    // Hapus produk
    $product->delete();

    return response()->json(['status' => 'success', 'message' => 'Product deleted successfully'], 200);

    }
    
}
