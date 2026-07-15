<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;

Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/authenticate',[LoginController::class,'authenticate'])->name('login.authenticate');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
Route::get('/Setting',[SettingController::class,'index'])->name('setting.index');
Route::put('/Setting/{setting}/update',[SettingController::class,'update'])->name('setting.update');

Route::resource('user',UserController::class);     