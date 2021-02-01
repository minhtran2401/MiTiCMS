<?php
// namespace App\Http\Controllers;
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
    Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/edit-profile', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('edit-profile');
    Route::get('/changepassword', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('changepassword');

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
//hosting
Route::prefix('hosting')->group(function () {
    Route::get('/', [App\Http\Controllers\HostingController::class, 'index'])->name('hosting.index');
    Route::get('/hosting-type', [App\Http\Controllers\HostingController::class, 'hosting_type'])->name('hosting.hosting-type');
    });
//end hosting
//account
Route::prefix('account')->group(function () {
    Route::get('/', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index');
    Route::get('/account-detail', [App\Http\Controllers\AccountController::class, 'account_detail'])->name('account.account-detail');
    });
//end account

});


///////////////Admin///////////////////////////////////
Route::group(['middleware' => ['checkadmin']], function () {
Route::prefix('admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\BE\AdminLoginController::class, 'show_login_form'])->name('admin.login')->withoutMiddleware('checkadmin');
    Route::post('/login', [App\Http\Controllers\BE\AdminLoginController::class, 'process_login'])->name('admin.login.process')->withoutMiddleware('checkadmin');
    Route::post('/logout', [App\Http\Controllers\BE\AdminLoginController::class, 'logout'])->name('logout.admin');
    Route::get('/', [App\Http\Controllers\BE\AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/register','AdminLoginController@show_signup_form')->name('register');
    // Route::post('/register','AdminLoginController@process_signup');
    Route::resource('/group-service', App\Http\Controllers\BE\GroupServiceController::class);
    Route::post('/group-service-ajax', [App\Http\Controllers\BE\GroupServiceController::class, 'storeajax'])->name('store.gr.ajax');



    Route::prefix('app')->group(function () {
        
    }); // app

  }); // admin
});