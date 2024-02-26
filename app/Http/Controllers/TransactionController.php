<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show(String $id) 
    {
        $cartData = Storage::get('data/cart.json');
        $cartItems = json_decode($cartData, true);

        return view('cart')->with(['cartItems'=> $cartItems, 'idChart' => $id]);
    }
}
