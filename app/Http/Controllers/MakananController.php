<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $foods = Product::all();

        return view('daftarmakanan', compact('foods'));
    }
}
