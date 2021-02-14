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
    Auth::routes(['verify' => true]); 
        Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'process_login'])->name('loginz');
        Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
        Route::post('/register', [App\Http\Controllers\Auth\LoginController::class,'process_signup'])->name('register');

    Route::get('/login',[App\Http\Controllers\Auth\LoginController::class,'show_login_form'])->name('login');
//   Route::get('/register','LoginController@show_signup_form')->name('register');

 
  
    

    

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('/ho-tro', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::post('/contact', [App\Http\Controllers\HomeController::class, 'send_support'])->name('send_support');
    Route::get('/huong-dan-thanh-toan', [App\Http\Controllers\HomeController::class, 'how_to_pay'])->name('how_to_pay');
    Route::post('/searchblog', [App\Http\Controllers\HomeController::class, 'searchblog'])->name('searchblog');
    Route::get('/chi-tiet-blog/{id}',[App\Http\Controllers\HomeController::class, 'blog_detail'])->name('blog_detail');


// trang cá nhân
    Route::prefix('trang-ca-nhan')->group(function(){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'profile'])->name('user-profile.profile');
        Route::get('/lich-su-mua', [App\Http\Controllers\HomeController::class, 'history_buy'])->name('history-buy');
        Route::post('/update-info/{id}', [App\Http\Controllers\HomeController::class, 'update_info'])->name('update_info');
        Route::get('/doi-mat-khau', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('user-profile.changepassword');
        Route::post('/changePassword',[App\Http\Controllers\HomeController::class, 'postCredentials'])->name('postCredentials');

    });
//domain
    Route::prefix('ten-mien')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'domain'])->name('domainprice.index');
        Route::get('/kiem-tra-ten-mien', [App\Http\Controllers\HomeController::class, 'view_check_domain'])->name('checkdomain.view');
        Route::post('/kiem-tra-ten-mien', [App\Http\Controllers\HomeController::class, 'check_domain'])->name('domain.check');
        Route::post('/add-cart',[App\Http\Controllers\BE\CartController::class, 'add_cart_domain'])->name('addcart.domain');
        Route::post('/check_out_domain',[App\Http\Controllers\BE\CartController::class, 'check_out_domain'])->name('check_out_domain');

});
//domain

//vps
    Route::prefix('vps')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'vps'])->name('vps.index.FE');
        Route::get('{slug}', [App\Http\Controllers\HomeController::class, 'vps_type'])->name('vps.vps-type');
        Route::post('/add-cart/{sku}',[App\Http\Controllers\BE\CartController::class, 'add_cart_vps'])->name('addcart.vps');
        Route::post('/check_out_vps',[App\Http\Controllers\BE\CartController::class, 'check_out'])->name('check_out');

    });
//end vps
//server
Route::prefix('server')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'server'])->name('server.index.FE');
    Route::get('{slug}', [App\Http\Controllers\HomeController::class, 'server_type'])->name('server.server-type');
    Route::post('/add-cart/{sku}',[App\Http\Controllers\BE\CartController::class, 'add_cart_server'])->name('addcart.server');
    Route::post('/check_out_server',[App\Http\Controllers\BE\CartController::class, 'check_out'])->name('check_out');

});
//end server
//hosting
    Route::prefix('hosting')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'hosting'])->name('hosting.index.FE');
        Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'hosting_type'])->name('hosting.hosting-type');
        Route::post('/add-cart/{sku}',[App\Http\Controllers\BE\CartController::class, 'add_cart_hosting'])->name('addcart.hosting');
        Route::post('/check_out_hosting',[App\Http\Controllers\BE\CartController::class, 'check_out'])->name('check_out');
    });
//end hosting
//account
    Route::prefix('tai-khoan')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'account'])->name('account.index.FE');
        Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'account_type'])->name('account.account-type');
        Route::post('/add-cart/{sku}',[App\Http\Controllers\BE\CartController::class, 'add_cart_account'])->name('addcart.account');
        Route::post('/check_out_account',[App\Http\Controllers\BE\CartController::class, 'check_out'])->name('check_out');
    });
//end account
Route::prefix('thanh-toan')->group(function () {
    Route::get('/vps', [App\Http\Controllers\HomeController::class, 'purchase_vps'])->name('purchase_vps');
    Route::get('/hosting', [App\Http\Controllers\HomeController::class, 'purchase_hosting'])->name('purchase_hosting');
    Route::get('/server', [App\Http\Controllers\HomeController::class, 'purchase_server'])->name('purchase_server');
    Route::get('/account', [App\Http\Controllers\HomeController::class, 'purchase_account'])->name('purchase_account');
    Route::get('/domain', [App\Http\Controllers\HomeController::class, 'view_reg_domain'])->name('view.domain.reg');

});

});


///////////////Admin///////////////////////////////////
Route::group(['middleware' => ['checkadmin']], function () {
Route::prefix('admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\BE\AdminLoginController::class, 'show_login_form'])->name('admin.login')->withoutMiddleware('checkadmin');
    Route::post('/login', [App\Http\Controllers\BE\AdminLoginController::class, 'process_login'])->name('admin.login.process')->withoutMiddleware('checkadmin');
    Route::post('/logout', [App\Http\Controllers\BE\AdminLoginController::class, 'logout'])->name('logout.admin');
    Route::get('/', [App\Http\Controllers\BE\DashboardController::class, 'tongquat'])->name('admin.dashboard');
    // Route::get('/register','AdminLoginController@show_signup_form')->name('register');
    // Route::post('/register','AdminLoginController@process_signup');
    Route::resource('/group-service', App\Http\Controllers\BE\GroupServiceController::class);
    Route::post('/group-service-ajax', [App\Http\Controllers\BE\GroupServiceController::class, 'storeajax'])->name('store.gr.ajax');
    Route::post('/change-status-group-service','App\Http\Controllers\BE\GroupServiceController@changeStatus')->name('changeStatus.group-service');
    Route::resource('/type-service', App\Http\Controllers\BE\TypeServiceController::class);
    Route::post('/type-service-ajax', [App\Http\Controllers\BE\TypeServiceController::class, 'storeajax'])->name('store.tp.ajax');
    Route::post('/change-status-type-service','App\Http\Controllers\BE\TypeServiceController@changeStatus')->name('changeStatus.type-service');
    Route::resource('/blog-type', App\Http\Controllers\BE\BlogTypeController::class);
    Route::post('/blog-type-ajax', [App\Http\Controllers\BE\BlogTypeController::class, 'storeajax'])->name('store.blt.ajax');
    Route::post('/change-status-blog-type','App\Http\Controllers\BE\BlogTypeController@changeStatus')->name('changeStatus.blog-type');
        //blog
    Route::resource('/blog', App\Http\Controllers\BE\BlogController::class);
    Route::post('/blog-ajax', [App\Http\Controllers\BE\BlogController::class, 'storeajax'])->name('store.bl.ajax');
    Route::post('/change-status-blog','App\Http\Controllers\BE\BlogController@changeStatus')->name('changeStatus.blog');
    Route::post('/change-status-blog2','App\Http\Controllers\BE\BlogController@changeStatus2')->name('changeStatus.blogspecial');

        //endblog
    Route::prefix('log')->group(function () {
        Route::get('/admin', [App\Http\Controllers\BE\LogController::class, 'admin'])->name('admin.log');
        Route::get('/user', [App\Http\Controllers\BE\LogController::class, 'user'])->name('user.log');
    }); // log

    Route::prefix('service')->group(function () {
        // vps ↓
        Route::resource('/vps', App\Http\Controllers\BE\VPSController::class);
        Route::get('/vps/get-type-pro/{service_group_id}', [App\Http\Controllers\BE\VPSController::class, 'get_type_pro'])->name('get_type_pro');
        Route::post('/change-status-vps-service','App\Http\Controllers\BE\VPSController@changeStatus')->name('changeStatus.vps-service');
        Route::post('/delprice','App\Http\Controllers\BE\VPSController@delPrice')->name('delPrice');
        // hosting ↓
        Route::resource('/hosting', App\Http\Controllers\BE\HostingController::class);
        Route::get('/hosting/get-type-pro/{service_group_id}', [App\Http\Controllers\BE\HostingController::class, 'get_type_pro'])->name('get_type_pro');
        Route::post('/change-status-hosting-service','App\Http\Controllers\BE\HostingController@changeStatus')->name('changeStatus.hosting-service');
        Route::post('/delprice','App\Http\Controllers\BE\HostingController@delPrice')->name('delPrice');
        // server ↓
        Route::resource('/server', App\Http\Controllers\BE\ServerController::class);
        Route::get('/server/get-type-pro/{service_group_id}', [App\Http\Controllers\BE\ServerController::class, 'get_type_pro'])->name('get_type_pro');
        Route::post('/change-status-server-service','App\Http\Controllers\BE\ServerController@changeStatus')->name('changeStatus.server-service');
        Route::post('/delprice','App\Http\Controllers\BE\ServerController@delPrice')->name('delPrice');
        
        // domain ↓
        Route::resource('/domain', App\Http\Controllers\BE\DomainController::class);
        Route::get('/domain/get-type-pro/{service_group_id}', [App\Http\Controllers\BE\DomainController::class, 'get_type_pro'])->name('get_type_pro');
        Route::post('/change-status-domain-service','App\Http\Controllers\BE\DomainController@changeStatus')->name('changeStatus.domain-service');
        Route::post('/delprice','App\Http\Controllers\BE\DomainController@delPrice')->name('delPrice');
        Route::post('/domain-ajax', [App\Http\Controllers\BE\DomainController::class, 'storeajax'])->name('store.dm.ajax');
        // account ↓
        Route::resource('/account', App\Http\Controllers\BE\AccountController::class);
        Route::get('/account/get-type-pro/{service_group_id}', [App\Http\Controllers\BE\AccountController::class, 'get_type_pro'])->name('get_type_pro');
        Route::post('/change-status-account-service','App\Http\Controllers\BE\AccountController@changeStatus')->name('changeStatus.account-service');
        Route::post('/delprice','App\Http\Controllers\BE\AccountController@delPrice')->name('delPrice');
        Route::post('/account-ajax', [App\Http\Controllers\BE\AccountController::class, 'storeajax'])->name('store.ac.ajax');

        
       
    }); // service
    // SEO ↓
    Route::resource('/seo', App\Http\Controllers\BE\SeoController::class);
    Route::get('/seo/get-type-pro/{service_group_id}', [App\Http\Controllers\BE\SeoController::class, 'get_type_seo'])->name('get_type_seo');
    // Route::post('/change-status-account-service','App\Http\Controllers\BE\AccountController@changeStatus')->name('changeStatus.account-service');
    // Route::post('/account-ajax', [App\Http\Controllers\BE\SeoController::class, 'storeajax'])->name('store.ac.ajax');

    // user ↓
    Route::post('/change-themes', [App\Http\Controllers\BE\AdminController::class, 'change_theme'])->name('change_theme');
    Route::resource('/user', App\Http\Controllers\BE\UserController::class);
    Route::post('/change-status-user-service','App\Http\Controllers\BE\UserController@changeStatus')->name('changeStatus.user-service');

    //end user

    // ads ↓
    Route::resource('/ads', App\Http\Controllers\BE\AdsController::class);
    Route::post('/ads-ajax', [App\Http\Controllers\BE\AdsController::class, 'storeajax'])->name('store.ads.ajax');
    Route::post('/change-status-ads','App\Http\Controllers\BE\AdsController@changeStatus')->name('changeStatus.ads');

    Route::resource('/ads', App\Http\Controllers\BE\AdsController::class);




    // infosite ↓
    Route::resource('/infosite', App\Http\Controllers\BE\InfoSiteController::class);
    Route::post('/change-status-info-site','App\Http\Controllers\BE\InfoSiteController@changeStatus')->name('changeStatus.info-site');
    Route::post('/change-protect-info-site','App\Http\Controllers\BE\InfoSiteController@changeProtect')->name('changeProtect.info-site');


    Route::prefix('app')->group(function () {
        
    }); // app

    //check bill
    Route::resource('/check-bill', App\Http\Controllers\BE\CheckInvoiceController::class);
    Route::post('/change-status-invoice/{id}','App\Http\Controllers\BE\CheckInvoiceController@quick_update')->name('quick_update_invoice');
    Route::post('/send_detail_account','App\Http\Controllers\BE\CheckInvoiceController@send_account')->name('send_detail_account');

    Route::resource('/storage', App\Http\Controllers\BE\StorageController::class);
    Route::post('/add-storage','App\Http\Controllers\BE\StorageController@storeajax')->name('add_storage');
    Route::post('/quickupdate-storage','App\Http\Controllers\BE\StorageController@update')->name('storage.quickupdate');



    // reply support
    Route::get('/reply-support','App\Http\Controllers\BE\ResupController@index')->name('show.case');
    Route::post('/reply-support','App\Http\Controllers\BE\ResupController@send_resup')->name('send_resup');

    //end check bill
    
    Route::post('short-day', [App\Http\Controllers\BE\DashBoardController::class, 'shortday'])->name('shortday');


    Route::prefix('quickadd')->group(function () {
        Route::get('/os-system', [App\Http\Controllers\BE\QuickAddController::class, 'os_system'])->name('os_system');
        Route::post('/os-system-destroy/{id}', [App\Http\Controllers\BE\QuickAddController::class, 'os_system_destroy'])->name('os_system.destroy');
        Route::post('/os-system-create', [App\Http\Controllers\BE\QuickAddController::class, 'os_system_create'])->name('store.os.ajax');
        /////
        Route::get('/status-invoice', [App\Http\Controllers\BE\QuickAddController::class, 'status_invoice'])->name('status_invoice');
        Route::post('/status-invioce-destroy/{id}', [App\Http\Controllers\BE\QuickAddController::class, 'status_invoice_destroy'])->name('status_invoice.destroy');
        Route::post('/status-invioce-reset', [App\Http\Controllers\BE\QuickAddController::class, 'reset_status_invoice'])->name('status_invoice.reset');
        Route::post('/status-invoice-create', [App\Http\Controllers\BE\QuickAddController::class, 'status_invoice_create'])->name('store.iv.ajax');
        //////////
        Route::get('/os-location', [App\Http\Controllers\BE\QuickAddController::class, 'location_system'])->name('hdh');
        Route::post('/os-location-destroy/{id}', [App\Http\Controllers\BE\QuickAddController::class, 'location_system_destroy'])->name('hdh.destroy');
        Route::post('/os-location-create', [App\Http\Controllers\BE\QuickAddController::class, 'location_system_create'])->name('hdh.ajax');
        /////////////
    }); // app
        /// payment method ////
        Route::resource('/payment-method', App\Http\Controllers\BE\PaymentMethodController::class);
        Route::post('/change-status-payment','App\Http\Controllers\BE\PaymentMethodController@changeStatus')->name('changeStatus.payment');

        Route::post('add-incomes', [App\Http\Controllers\BE\DashBoardController::class, 'add_incomes'])->name('add_incomes');
        Route::post('add-funds', [App\Http\Controllers\BE\DashBoardController::class, 'add_funds'])->name('add_funds');

  }); // admin
});