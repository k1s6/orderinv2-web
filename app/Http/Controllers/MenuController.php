<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function makanan()
    {
        // Logika untuk menampilkan halaman makanan
        return view('daftarmakanan');
    }

    public function minuman()
    {
        // Logika untuk menampilkan halaman minuman
        return view('daftarminuman');
    }
}
