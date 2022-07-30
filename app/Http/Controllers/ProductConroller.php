<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductConroller extends Controller
{
    

    public function UrunGoster(Request $request){

        return view('urunler');
    }
}
