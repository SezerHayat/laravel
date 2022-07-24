<?php

namespace App\Http\Controllers;

use App\Models\Mesai;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MesaiController extends Controller
{
    public function mesaiStart(){
        date_default_timezone_set("europe/Istanbul");

        Mesai::create([
            'personel_id'=>Auth::id(),
            'start'=> date('H:i',time())
        ]);
        return redirect()->route('home')->with('message', 'Mesaiye Başlandı')->with('message-type', 'success');

    }

    public function mesaiEnd(){
        date_default_timezone_set("europe/Istanbul"); 
        $mesai = Mesai::where('personel_id',Auth::id())->orderBy('created_at','DESC')->limit(1)->first();

        $now = Carbon::now();
        $startDate = $mesai->created_at;

        $dailyTotal = abs((strtotime($now)-strtotime($startDate)))/60;

        // dd($dailyTotal);

        // dd(strtotime($now)-strtotime($startDate));
        // $dailyTotal = substr(abs((strtotime($now)-strtotime($startDate))/60/60),0,4);


        $mesai->update([
            'end'=>$now,
            'total'=>substr($dailyTotal/60,0,4)
        ]);

        return redirect()->route('home')->with('message', 'Mesaiye Bitti')->with('message-type', 'success');

    }
}
