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
    

Route::group(['middleware' => ['auth']], function () {
// trang cá nhân
    Route::prefix('trang-ca-nhan')->group(function(){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'profile'])->name('user-profile.profile');
        Route::get('/chinh-sua-thong-tin', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('user-profile.edit-profile');
        Route::get('/doi-mat-khau', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('user-profile.changepassword');
    });
//domain
    Route::prefix('ten-mien')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'domain'])->name('domain.index');
        Route::get('/kiem-tra-ten-mien', [App\Http\Controllers\HomeController::class, 'view_check_domain'])->name('checkdomain.view');
        Route::post('/kiem-tra-ten-mien', [App\Http\Controllers\HomeController::class, 'check_domain'])->name('domain.check');
        Route::get('/dang-ki-ten-mien', [App\Http\Controllers\HomeController::class, 'view_reg_domain'])->name('view.domain.reg');
});
//domain

//vps
    Route::prefix('may-ao')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'vps'])->name('vps.index');
        Route::get('/loai-may-ao', [App\Http\Controllers\HomeController::class, 'vps_type'])->name('vps.vps-type');
    });
//end vps
//hosting
    Route::prefix('hosting')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'hosting'])->name('hosting.index');
        Route::get('/loai-hosting', [App\Http\Controllers\HomeController::class, 'hosting_type'])->name('hosting.hosting-type');
    });
//end hosting
//account
    Route::prefix('tai-khoan')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('account.index');
        Route::get('/thong-tin-tai-khoan', [App\Http\Controllers\HomeController::class, 'account_detail'])->name('account.account-detail');
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
    Route::post('/change-status-group-service','App\Http\Controllers\BE\GroupServiceController@changeStatus')->name('changeStatus.group-service');
    Route::resource('/type-service', App\Http\Controllers\BE\TypeServiceController::class);
    Route::post('/type-service-ajax', [App\Http\Controllers\BE\TypeServiceController::class, 'storeajax'])->name('store.tp.ajax');
    Route::post('/change-status-type-service','App\Http\Controllers\BE\TypeServiceController@changeStatus')->name('changeStatus.type-service');

    Route::prefix('log')->group(function () {
        Route::get('/admin', [App\Http\Controllers\BE\LogController::class, 'admin'])->name('admin.log');
        Route::get('/user', [App\Http\Controllers\BE\LogController::class, 'user'])->name('user.log');
    }); // log

    Route::prefix('service')->group(function () {
        Route::resource('/vps', App\Http\Controllers\BE\VPSController::class);
        Route::get('/vps/get-type-pro/{service_group_id}', [App\Http\Controllers\BE\VPSController::class, 'get_type_pro'])->name('get_type_pro');
        Route::post('/change-status-vps-service','App\Http\Controllers\BE\VPSController@changeStatus')->name('changeStatus.vps-service');
        Route::post('/delprice','App\Http\Controllers\BE\VPSController@delPrice')->name('delPrice');

    }); // service


    Route::prefix('app')->group(function () {
        
    }); // app

  }); // admin
});