<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $products= Products::all();
        return view('adminDashboard', compact('products'));
    }
}


