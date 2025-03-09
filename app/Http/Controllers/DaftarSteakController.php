<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DaftarSteakController extends Controller
{
    public function index()
    {
        $foods = Product::all();

        return view('daftarsteak', compact('foods'));
    }
}
