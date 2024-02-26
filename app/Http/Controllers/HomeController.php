<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        // return "Method ini nantinya akan digunakan untuk mengambil semua data user";

        $nama = "Pramudya Putra Pratama";
        $pelajaran = ["Algoritma & Pemrograman", "Kalkulus", "Pemrograman Web", "Manajemen Proyek"];

        // return view('home', compact('nama', 'pelajaran'));
        return view('home', ['nama'=>$nama, 'pelajaran'=>$pelajaran]); // menggunakan object secara langsung
    }
}
