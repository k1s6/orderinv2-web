<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "Method ini nantinya akan digunakan untuk mengambil semua data user";

        $nama = "Pramudya Putra Pratama";
        $pelajaran = ["Algoritma & Pemrograman", "Kalkulus", "Pemrograman Web", "Manajemen Proyek"];

        // return view('home', compact('nama', 'pelajaran'));
        return view('home', ['nama'=>$nama, 'pelajaran'=>$pelajaran]); // menggunakan object secara langsung
    }

    public function create()
    {
        return 'Method ini nantinya akan digunakan untuk menampilkan form untuk menambah data user';
    }
    
    public function store(Request $request)
    {
        return 'Method ini nantinya akan digunakan untuk menciptakan data user yang baru';
    }
    
    public function show(string $id)
    {
        return 'Method ini nantinya akan digunakan untuk mengambil satu data user dengan id=' . $id;        
    }
    
    public function edit(string $id)
    {
        return 'Method ini nantinya akan digunakan untuk menampilkan form untuk mengubah data edit dengan id=' . $id;
    }
    
    public function update(Request $request, string $id)
    {
        return 'Method ini nantinya akan digunakan untuk mengubah data user dengan id=' . $id;
    }
    
    public function destroy(string $id)
    {
        return 'Method ini nantinya akan digunakan untuk menghapus data user dengan id=' . $id;        
    }
}
