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

            $overtime = 0;

            $overtimeMesai = Mesai::whereDate('created_at', '>=', Carbon::now()->modify('first day of this month'))
                ->whereDate('created_at', '<=', Carbon::now()->modify('last day of this month'))
                ->get();

            foreach ($overtimeMesai as $value) {
                $overtime = $overtime + ($value->overtime_clock + ($value->overtime_minute / 60));
            }

            $overtimeLast = 0;

            $overtimeLastMesai = Mesai::whereDate('created_at', '>=', Carbon::now()->subDay(30)->modify('first day of this month'))
                ->whereDate('created_at', '<=', Carbon::now()->subDay(30)->modify('last day of this month'))
                ->get();
            foreach ($overtimeLastMesai as $value) {
                $overtime = $overtime + ($value->overtime_clock + ($value->overtime_minute / 60));
            }
            
            $mesaiCurrent = $overtime-$overtimeLast;

            return view('home', compact('personels', 'userAccount', 'overtime','mesaiCurrent'));
        } else {
            // Personel
            $mesai = Mesai::where('personel_id', Auth::id())->orderBy('created_at', 'DESC')->get();

            $mesaiControl = Mesai::where('personel_id', Auth::id())->orderByDesc('id')->limit(1)->first();
            return view('home', compact('userAccount', 'mesai', "mesaiControl"));
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
