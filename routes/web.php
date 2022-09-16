<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::middleware(['auth'])->group(function() {

    Route::group(['middleware' => ['role:admin']], function () {
        // Role
        Route::resource('role', RoleController::class)->except([
            'create', 'show', 'edit'
        ]);

        // User
        Route::resource('user', UserController::class)->except([
            'show'
        ]);
    });

    Route::group(['middleware' => ['role:admin|security|pegawai']], function () {
         // Dashboard
         Route::get('/home', [DashboardController::class, 'index']);
         Route::get('setting', [DashboardController::class, 'setting']);
         Route::post('setting', [DashboardController::class, 'updateProfile'])->name('setting.updateProfile');

         // Pegawai
         Route::resource('pegawai', EmployeeController::class)->only([
             'index', 'store', 'update', 'edit', 'show', 'destroy'
         ]);
 
         // Tamu
         Route::resource('tamu', GuestController::class)->only([
             'index', 'store', 'destroy'
         ]);
 
    });
    
    
    Route::post('/logout', [LoginController::class, 'logout']);
});



