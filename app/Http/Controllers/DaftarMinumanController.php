<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarMinumanController extends Controller
{
    public function index()
    {
        // Di sini Anda dapat melakukan operasi apa pun yang diperlukan sebelum menampilkan halaman,
        // seperti mengambil data dari database

        return view('daftarminuman'); // Sesuaikan dengan nama view Anda
    }
}
