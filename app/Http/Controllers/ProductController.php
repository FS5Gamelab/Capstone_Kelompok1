<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('product', ['kendaraans' => $kendaraans]);
    }
}