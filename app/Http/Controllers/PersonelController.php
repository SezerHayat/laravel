<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PersonelController extends Controller
{


    public function personelAdd(Request $request){
        dd($request->name);
        // Burda bıraktık...
    }




    public function index(){
        return view('personel');
    }
}
