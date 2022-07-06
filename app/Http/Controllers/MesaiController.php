<?php

namespace App\Http\Controllers;

use App\Models\Mesai;
use Illuminate\Http\Request;
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

        $nowHour = (date('H:i',time()));
        $now = strtotime(date('H:i',time()));

        $start=(int) strtotime($mesai->start);

        
        $total=(($now-$start)/1440)/4;
        // dd($total);
        $mesai->update([
            'end'=>$nowHour,
            "total"=>$total
        ]);
        return redirect()->route('home')->with('message', 'Mesaiye Bitti')->with('message-type', 'success');

    }
}
