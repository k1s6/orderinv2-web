<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakananController extends Controller
{
    public function index()
    {
        $foods = Product::all();

        $bestSellerCodes = DetailTransaksi::select('kode_product', DB::raw('count(*) as total'))
            ->groupBy('kode_product')
            ->orderByDesc('total')
            ->take(4)
            ->pluck('kode_product');

        $bestSeller = Product::whereIn('kode_product', $bestSellerCodes)->get();

        return view('daftarmakanan', compact(
            'foods',
            'bestSeller'
        ));
    }
}
