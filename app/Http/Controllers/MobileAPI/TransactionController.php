<?php

namespace App\Http\Controllers\MobileAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showPesananIn(Request $request) {
        // show data pesanan
    }

    public function updatePesanan(Request $request) {
        $status = $request->input('status');

        $validStatus = ['diterima', 'ditolak', 'dikonfirmasi'];

        if (!in_array($status, $validStatus)) {
            return response()->json(['status' => 'error', 'message' => 'status tidak valid'], 400);
        }
        
        
    
    }
}
