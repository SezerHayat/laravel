<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StokController extends Controller
{
    public function stokAdd(Request $request){
        return 1;
    }

    public function StokGoster(Request $request)
    {
        return view('stok');
    }


}
