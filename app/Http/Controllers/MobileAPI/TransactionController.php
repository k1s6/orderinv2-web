<?php

namespace App\Http\Controllers\MobileAPI;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Details;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showPesananIn(Request $request, $status) {
        // show data pesanan
        try {
            $transactions = Transaksi::with('details')->where('status', $status)->get();;


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

    public function updatePesanan(Request $request, $id) {
        $status = $request->input('status');

        $validStatus = ['diterima', 'ditolak', 'dikonfirmasi'];

        if (!in_array($status, $validStatus)) {
            return response()->json(['status' => 'error', 'message' => 'status not valid'], 400);
        } else {
            
            $transaction = Transaksi::find($id);

            if (!$transaction) {
                return response()->json(['status' => 'fail', 'message' => 'Transaction not found'], 404);
            }

            $transaction->status = $status;

            $transaction->save();

            return response()->json(['status' => 'success', 'message' => 'Transaction status updated successfully', 'data' => $transaction], 200);
        }
        
        
    
    }
}
