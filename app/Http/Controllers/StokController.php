<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StokController extends Controller
{
    public function StokAdd(Request $request){
        return;

    }

    public function StokGoster(Request $request){
        return view('stok');
    }
}
