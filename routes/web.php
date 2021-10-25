<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;

//Home
Route::get('/', [HomeController::class, 'index']);

//User Authentication
Route::get('admin-dashboard', [LoginController::class, 'adminDashboard']);
Route::post('user-login', [LoginController::class, 'userLogin']);
Route::get('user-logout', [LoginController::class, 'userLogout']);
