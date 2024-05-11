<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function show(String $id) 
    {
        // Cek apakah file 'cart.json' ada
        if (Storage::exists('data/cart.json')) {
            // Ambil data dari file 'cart.json'
            $cartData = Storage::get('data/cart.json');
            // Dekode data menjadi array
            $cartItems = json_decode($cartData, true);
        } else {
            // Jika file 'cart.json' tidak ditemukan, inisialisasi $cartItems sebagai array kosong
            $cartItems = [];
        }

        // Pass the cart items data and the $id parameter to the view
        return view('cart', ['cartItems' => $cartItems, 'idChart' => $id]);
    }
}
