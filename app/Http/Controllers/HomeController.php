<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $personels = Personel::with('getUser')->get();

        return view('home',compact('personels'));
    }

    public function personeller(){
        $personels = Personel::with('getUser')->get();
        return view('personel',compact('personels'));
    }
}
