<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DaftarMinumanController extends Controller
{
    public function index() {
        $foods = Product::where('jenis_product', 'minuman')->get();

        return view('daftarminuman', compact('foods'));
    }
}
