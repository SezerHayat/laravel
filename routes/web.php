<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonelController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home');

Route::group(['prefix'=>'personel'],function(){
    Route::post('/add',[PersonelController::class,'personelAdd'])->name('personelAdd');
});
