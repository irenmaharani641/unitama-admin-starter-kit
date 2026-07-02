<?php
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
Route::resource('user',UserController::class);    