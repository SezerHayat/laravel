<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function stokAdd(Request $request){
        
        $this->validate($request, [
            'name' => 'required',
            'prop' => 'required',
            'qty' => 'required'
        ]);

        $user = Stok::create([
            'name' => $request->name,
            'prop' => $request->prop,
            'qty' => $request->qty
        ]);

        return redirect()->route('stok')->with('message', 'Başarıyla Eklendi')->with('message-type', 'success');

    }

    public function StokGoster(Request $request)
    {
        return view('stok');
    }


}
