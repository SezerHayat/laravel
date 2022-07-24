<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MesaiController;
use App\Http\Controllers\PersonelController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// Route::get('/personeller',[HomeController::class,'personeller'])->name('personeller');

Route::redirect('/','/login');
Route::match(['get','post'],'/login',[UserController::class,'login'])->name('login');
Route::get('/login',[UserController::class,'loginPage'])->name('loginPage');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::group(['middleware'=>'auth'],function(){

    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::group(['prefix'=>'personel'],function(){
        Route::get('/',[PersonelController::class,'personel'])->name('personel');
        Route::post('/add',[PersonelController::class,'personelAdd'])->name('personelAdd');
        Route::get('/delete/{id}',[PersonelController::class,'personelRemove'])->name('personelRemove');
        Route::get('/detail/{id}',[PersonelController::class,'personelEdit'])->name('personelEdit');
        Route::post('/password/{id}',[PersonelController::class,'personelEditPassword'])->name('personelEditPassword');
        Route::post('/upadte/{id}',[PersonelController::class,'personelUpdate'])->name('personelUpdate');
    });
    Route::post('/mesaiStart',[MesaiController::class,'mesaiStart'])->name('mesaiStart');
    Route::post('/mesaiEnd',[MesaiController::class,'mesaiEnd'])->name('mesaiEnd');
    
    Route::get('/stok', [StokController::class,'StokGoster'])->name('stok');
    Route::post('/stok', [StokController::class,'StokAdd']);
});

