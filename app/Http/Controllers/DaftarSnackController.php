<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DaftarSnackController extends Controller
{
    public function index() {
        $foods = Product::where('jenis_product', 'snack')->get();

        return view('daftarsnack', compact('foods'));
    }
}
