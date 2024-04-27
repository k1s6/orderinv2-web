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
    
    public function searchProduct(Request $request, $jenis) {
        $keyword = $request->input('keyword');
        
        // Pastikan jenis produk yang diminta valid
        $validJenis = ['snack', 'makanan', 'steak', 'minuman'];
        if (!in_array($jenis, $validJenis)) {
            return response()->json(['status' => 'error', 'message' => 'Jenis produk tidak valid'], 400);
        }
        
        // Cari produk berdasarkan nama produk yang cocok dengan kata kunci dan jenis kategori
        $products = Product::where('jenis_product', $jenis)
                           ->where('nama_product', 'like', "%$keyword%")
                           ->get();

        if ($products->isEmpty()) {
            return response()->json(['status' => 'kosong', 'message' => 'Tidak ada produk yang ditemukan'], 404);
        }
        
        return response()->json(['status' => 'success', 'data' => $products], 200);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            // Validasi gambar jika diperlukan
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Sesuaikan dengan kebutuhan Anda
            ]);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('asset/img'), $imageName); // Simpan gambar di folder public/img

            // Return URL gambar yang baru saja diupload
            return response()->json(['status' => 'success', 'data' => asset('asset/img/' . $imageName), 'name' => $imageName], 200);
        } else {
            // Jika tidak ada gambar yang diupload
            return response()->json(['status' => 'failed', 'message' => 'No image uploaded'], 400);
        }
    }
    
    
}
