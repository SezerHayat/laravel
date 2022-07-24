<?php

namespace App\Http\Controllers;

use App\Models\Mesai;
use App\Models\Personel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $userAccount = Auth::user();

        // admin
        if ($userAccount->isAdmin == 1) {
            $personels = Personel::with('getUser')->get();

            return view('home', compact('personels', 'userAccount'));
        }
        else
        {
            // Personel
            $mesai = Mesai::where('personel_id',Auth::id())->orderBy('created_at','DESC')->get();

            $mesaiControl = Mesai::where('personel_id',Auth::id())->orderByDesc('id')->limit(1)->first();

            date_default_timezone_set("europe/Istanbul"); 
            $mesais = Mesai::where('personel_id',Auth::id())->orderBy('created_at','DESC')->limit(1)->first();
            $now = $mesais->updated_at;
            $startDate = $mesais->created_at;
    
            $dailyTotal = abs((strtotime($now)-strtotime($startDate)))/60/60;

            Mesai::orderBy('created_at','DESC')->limit(1)->where('personel_id',Auth::id())->update([
                'total'=>$dailyTotal,
                'end'=>$now
            ]);

            return view('home', compact('userAccount','mesai',"mesaiControl",'dailyTotal'));
        }
    }

    public function personeller()
    {
       
        $userAccount = Auth::user();

        if ($userAccount->isAdmin == 1) {
            $personels = Personel::with('getUser')->get();
            return view('personel', compact('personels', 'userAccount'));
        }
        
    }
}
