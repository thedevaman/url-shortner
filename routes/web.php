<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\AdminController;
 use App\Http\Controllers\MemberController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UrlController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', [UrlController::class, 'redirect'])->name('redirect');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'index'])
        ->name('superadmin.dashboard');
    Route::post('/superadmin/company/store', [SuperAdminController::class, 'store'])
        ->name('superadmin.company.store');
    Route::post('/superadmin/admin/store', [SuperAdminController::class, 'admin_store'])
        ->name('superadmin.admin.store');    
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
    Route::post('/admin/store', [AdminController::class, 'store'])
        ->name('admin.admin.store');    
    Route::post('/admin/member/store', [AdminController::class, 'member_store'])
        ->name('admin.member.store');   
    Route::post('/admin/short_url/store', [UrlController::class, 'short_url_store'])
        ->name('admin.short_url.store'); 
});

Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'index'])
        ->name('member.dashboard');
    Route::post('/member/short_url/store', [UrlController::class, 'short_url_store'])
        ->name('member.short_url.store');  
});

