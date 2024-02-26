<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    public function index() {
        return "Halo ini adalah method index, dalam controller ManagementUser";
    }

    public function apapun() {
        return 'ini apapun';
    }
}
