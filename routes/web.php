<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BanggiaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DatSanController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImgSanChaController;
use App\Http\Controllers\SanBongController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('isLogin')->prefix('')->group(function() {
    Route::get('/',[HomeController::class,'index'])->name('index');
    Route::get('/auth',[AuthController::class,'index'])->name('auth');
    Route::post('/auth-register',[AuthController::class,'register'])->name('register');
    Route::post('/auth-login',[AuthController::class,'login'])->name('login');
});

Route::middleware('admin.checkLogin')->prefix('admin')->name('admin.')->group(function (){
    Route::get('/',[AdminController::class,'index'])->name('home');
    Route::get('/quanly',[AdminController::class,'quanly'])->name('quanly');
    Route::get('/edit',[AdminController::class,'edit'])->name('edit');
    Route::post('/edit',[AdminController::class,'edit'])->name('edit');
    Route::put('/update',[AdminController::class,'update'])->name('update');
    Route::delete('/xoa',[AdminController::class,'destroy'])->name('destroy');
    Route::get('/profile',[AdminController::class,'profile'])->name('profile');
    Route::post('/profile_edit',[AdminController::class,'profile_edit'])->name('profile_edit');
    Route::post('/password_update',[AdminController::class,'password_update'])->name('password_update');
    Route::get('/datsan',[AdminController::class,'DatSanFun'])->name('datsan');
    Route::get('/datsan/{id}/{day}',[AdminController::class,'DatSanFun'])->name('datsan');
    Route::post('/datsan',[AdminController::class,'DatSanFun'])->name('datsanPost');
    
});

Route::middleware('client.checkLogin')->prefix('client')->name('client.')->group(function (){
    Route::get('/',[ClientController::class,'index'])->name('home');
    Route::get('/quanlysanbong',[ClientController::class,'quanlysanbong'])->name('quanly');
    Route::post('/quanlysanbong',[ClientController::class,'quanlysanbongwithdb'])->name('quanlywithdb');
    Route::get('/edit',[ClientController::class,'edit'])->name('edit');
    // Route::post('/store',[ClientController::class,'store'])->name('store');
    Route::post('/edit',[ClientController::class,'edit'])->name('editpost');
    Route::post('/update',[ClientController::class,'update'])->name('update');
    Route::delete('/destroy',[ClientController::class,'destroy'])->name('destroy');
    Route::get('/thongke',[ClientController::class,'thongke'])->name('thongke');
    Route::post('/thongke',[ClientController::class,'thongkepost'])->name('thongkepost');
    Route::get('/thongbao',[ClientController::class,'thongbao'])->name('thongbao');
    Route::get('/datsan',[ClientController::class,'DatSanFun'])->name('datsan');
    Route::get('/datsan/{id}/{day}',[ClientController::class,'DatSanFun'])->name('datsan');
    Route::post('/datsan',[ClientController::class,'DatSanFun'])->name('datsanPost');
    Route::get('/profile',[ClientController::class,'profile'])->name('profile');
    Route::post('/profile_edit',[ClientController::class,'profile_edit'])->name('profile_edit');
    Route::post('/password_update',[ClientController::class,'password_update'])->name('password_update');


    
    
});

Route::middleware('user.checkLogin')->prefix('user')->name('user.')->group(function (){
    Route::get('/',[UserController::class,'index'])->name('home');
    Route::get('/datsan',[UserController::class,'DatSanFun'])->name('datsan');
    Route::get('/datsan/{id}/{day}',[UserController::class,'DatSanFun'])->name('datsan');
    Route::post('/datsan',[UserController::class,'DatSanFun'])->name('datsanPost');
    Route::get('/thongbao',[UserController::class,'thongbao'])->name('thongbao');
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::post('/profile_edit',[UserController::class,'profile_edit'])->name('profile_edit');
    Route::post('/password_update',[UserController::class,'password_update'])->name('password_update');

    
    
});

Route::prefix('hinhanh')->name('hinhanh.')->group(function (){
    Route::get('/{id}',[ImgSanChaController::class,'index'])->name('index');
    Route::post('/upload',[ImgSanChaController::class,'upload'])->name('upload');
    
    
});

Route::prefix('sanbong')->name('sanbong.')->group(function (){
    Route::post('/create',[SanBongController::class,'create'])->name('create');
    Route::delete('/destroy',[SanBongController::class,'destroy'])->name('destroy');
    
    
});

Route::prefix('banggia')->name('banggia.')->group(function (){
    Route::post('/create5',[BanggiaController::class,'create5'])->name('create5');
    Route::post('/create7',[BanggiaController::class,'create7'])->name('create7');
    Route::delete('/destroy',[BanggiaController::class,'destroy'])->name('destroy');
    
    
});

Route::prefix('datsan')->name('datsan.')->group(function (){
    Route::post('/create',[DatSanController::class,'create'])->name('create');
    
    
    
});

Route::get('/error',[ErrorController::class,'index'])->name('error');



