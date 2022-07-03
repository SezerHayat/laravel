<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonelController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home');

// Route::get('/personeller',[HomeController::class,'personeller'])->name('personeller');

Route::group(['prefix'=>'personel'],function(){
    Route::post('/add',[PersonelController::class,'personelAdd'])->name('personelAdd');
    Route::get('/delete/{id}',[PersonelController::class,'personelRemove'])->name('personelRemove');
    Route::get('/detail/{id}',[PersonelController::class,'personelEdit'])->name('personelEdit');
    Route::post('/upadte/{id}',[PersonelController::class,'personelUpdate'])->name('personelUpdate');
});