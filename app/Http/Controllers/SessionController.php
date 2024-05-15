<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function CreateSession(Request $request) : String {
        $request->session()->put("userId", "Pramudya");
        $request->session()->put("isMember", true);
        return "OK";
    }

    public function getSessions(Request $request) {
        $name = $request->session()->get('fullName');
        $chart = $request->session()->get('cart');

        return $chart;
    }
}
