<?php

namespace App\Http\Controllers;

use App\Models\Mesai;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MesaiController extends Controller
{
    public function index(){
        $mesais = Mesai::orderByDesc('id')->get();

        return view('mesai',compact('mesais'));
    }
    public function overtime(){
        $mesais = Mesai::where('overtime_clock','>=',0)->get();

        return view('overtime',compact('mesais'));
    }

    public function mesaiStart()
    {
        date_default_timezone_set("europe/Istanbul");

        Mesai::create([
            'personel_id' => Auth::id(),
            'start' => Carbon::now()
        ]);
        return redirect()->route('home')->with('message', 'Mesaiye Başlandı')->with('message-type', 'success');
    }

    public function mesaiEnd()
    {
        date_default_timezone_set("europe/Istanbul");
        $mesai = Mesai::where('personel_id', Auth::id())->orderBy('created_at', 'DESC')->limit(1)->first();

        $now = Carbon::now()->format('H:i:s');
        $startDate = substr($mesai->start, -1 - 8);

        $current = strtotime($now) - strtotime($startDate);
        $minute = $current / 60;
        $second_current = floor($current - (floor($minute) * 60));
        $clock = $minute / 60;
        $minute_current = floor($minute - (floor($clock) * 60));
        $day = $clock / 24;
        $clock_current = floor($clock - (floor($day) * 60));

        $current_text = $clock_current . ' Saat ' . $minute_current . ' Dakika ' . $second_current . ' Saniye';

        if ($clock_current >= 9) {
            $overtime = (($clock_current - 9) * 60) + $minute_current;
            $mesai->update([
                'end' => Carbon::now(),
                'total' => $current_text,
                'clock' => $clock_current,
                'minute' => $minute_current,
                'overtime_clock' => floor($overtime / 60),
                'overtime_minute' => $minute_current,
            ]);
            return redirect()->route('home')->with('message', 'Mesaiye Bitti')->with('message-type', 'success');
        }

        $mesai->update([
            'end' => Carbon::now(),
            'total' => $current_text,
            'clock' => $clock_current,
            'minute' => $minute_current,
            'overtime_clock' => 0,
            'overtime_minute' => 0
        ]);


        return redirect()->route('home')->with('message', 'Mesaiye Bitti')->with('message-type', 'success');
    }

    public function mesainote(Request $request, $id)
    {
        Mesai::where('id', $id)->update([
            'notes' => $request->notes
        ]);


        return redirect()->route('home')->with('message', 'Not Eklendi')->with('message-type', 'success');
    }
}
