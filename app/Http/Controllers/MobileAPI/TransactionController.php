<?php

namespace App\Http\Controllers\MobileAPI;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Details;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showPesananIn(Request $request) {
        // show data pesanan
        try {
            $transactions = Transaksi::with('details.product')->get();;


            if ($transactions) {
                // return 
                return response()->json(['status' => 'success', 'message' => 'status succes', 'data' => $transactions], 200);
            } else {
                
                return response()->json(['status' => 'fail', 'message' => 'failed'], 200);
            }
            
        } catch (\Exception $e) {
            
            return response()->json(['status' => 'failure', 'message' => $e], 500);
        }
    }   

    public function updatePesanan(Request $request) {
        $status = $request->input('status');

        $validStatus = ['diterima', 'ditolak', 'dikonfirmasi'];

        if (!in_array($status, $validStatus)) {
            return response()->json(['status' => 'error', 'message' => 'status tidak valid'], 400);
        }
        
        
    
    }
}
