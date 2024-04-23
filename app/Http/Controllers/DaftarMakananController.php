<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarMakananController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nama dari input
        $nama = $request->nama;

        // Lakukan operasi apa pun yang diperlukan dengan nama

        // Tampilkan halaman daftarmakan
        return view('daftarmakanan', ['nama' => $nama]);
    }


}
