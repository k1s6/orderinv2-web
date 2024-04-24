<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(){
        return view('landingpage');
    }
    
    public function validateName(Request $request) {
        
        $fullName = $request->input('fullName');

        // Process the received name data (store in session, database, etc.)
        $request->session()->put('fullName', $fullName);
        echo "data telah ditambahkan ke session";

        // Return a success response (optional)
        // return response()->json(['message' => 'Data submitted successfully!']); // Adjust as needed
        
    } 
}
