<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

class penjualanController extends Controller
{
    //
    public function index(){
        $data = barang::all();
            return view('penjualan.index', ['dataBarang' => $data]);
    }
}
