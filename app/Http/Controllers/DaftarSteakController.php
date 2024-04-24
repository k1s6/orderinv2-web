<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DaftarSteakController extends Controller
{
    public function index() {
        $foods = Product::where('jenis_product', 'steak')->get();

        return view('daftarmakanan', compact('foods'));
    }
}
