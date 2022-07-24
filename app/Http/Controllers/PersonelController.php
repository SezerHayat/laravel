<?php

namespace App\Http\Controllers;

use App\Models\Mesai;
use App\Models\Personel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PersonelController extends Controller
{

    public function personel()
    {
       
        $userAccount = Auth::user();

        if ($userAccount->isAdmin == 1) {
            
            $personels = Personel::with('getUser')->get();
            return view('personel', compact('personels', 'userAccount'));
        }
        
    }

    public function personelAdd(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $personel = Personel::create([
            'user_id' => $user->id
        ]);

        return redirect()->route('home')->with('message', $user->name . ' Başarıyla Eklendi')->with('message-type', 'success');
    }


    public function personelRemove($id)
    {
        $personel = Personel::with('getUser')->find($id);

        $personel->delete();

        return redirect()->route('home')->with('message', $personel->getUser->name.' Başarıyla Silindi')->with('message-type', 'success');
    }

    public function personelEdit($id){

        $personel = Personel::with('getUser')->find($id);

        return view('personel',compact('personel'));

    }

    public function personelUpdate(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return redirect()->back()->with('message',' Başarıyla Güncellendi')->with('message-type', 'success');

    }

    public function personelEditPassword(Request $request,$id){
        $this->validate($request, [
            'password' => 'required|min:5',
        ]);

        User::where('id',$id)->update([
            'password'=>$request->password,
        ]);

        return redirect()->back()->with('message',' Şifre Başarıyla Güncellendi')->with('message-type', 'success');
    }

    // public function index()
    // {
    //     return view('home');
    // }
}
