<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getProduct()
    {
        $foods = Product::all();

        return response()->json($foods);
    }

    public function getImage($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'status' => 'success',
                'image' => $product->gambar_product,
            ]);
        } else {
            return response()->json([
                'status' => 'fail',
                'message' => 'Product not found',
            ], 404);
        }
    }
}
