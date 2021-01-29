<?php

use Illuminate\Support\Facades\Route;

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
 Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Auth::routes(); 
        Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'process_login'])->name('loginz');
        Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
        Route::post('/register', [App\Http\Controllers\Auth\LoginController::class,'process_signup'])->name('register');

//     Route::get('/login','LoginController@show_login_form')->name('login');
//   Route::get('/register','LoginController@show_signup_form')->name('register');

 
  
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::group(['middleware' => ['auth']], function () {
//domain
    Route::prefix('ten-mien')->group(function () {
    Route::get('/', [App\Http\Controllers\DomainController::class, 'index'])->name('domain.index');
    Route::get('/kiem-tra-ten-mien', [App\Http\Controllers\DomainController::class, 'view_check_domain'])->name('checkdomain.view');
    Route::post('/kiem-tra-ten-mien', [App\Http\Controllers\DomainController::class, 'check_domain'])->name('domain.check');
    Route::get('/dang-ki-ten-mien', [App\Http\Controllers\DomainController::class, 'view_reg_domain'])->name('view.domain.reg');
});
//domain

//vps
Route::prefix('vps')->group(function () {
    Route::get('/', [App\Http\Controllers\VpsController::class, 'index'])->name('vps.index');
    Route::get('/vps-type', [App\Http\Controllers\VpsController::class, 'vps_type'])->name('vps.vps-type');
    });
//end vps

});
