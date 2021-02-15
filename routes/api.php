<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function(Request $request){
    return response()->json(['Get api TiMiHost' => 'success', 'TranNhatMinh' => 'Welcome'], 200);
})->name('api.index');
Route::get('/thong-ke-truy-cap', [App\Http\Controllers\BE\DashBoardController::class, 'thong_ke_truy_cap'])->name('api.thong_ke_truy_cap');
Route::get('/khach-hang-tiem-nang', [App\Http\Controllers\BE\DashBoardController::class, 'khach_hang_tiem_nang'])->name('api.khach_hang_tiem_nang');
Route::get('/san-pham-ban-chay', [App\Http\Controllers\BE\DashBoardController::class, 'san_pham_ban_chay'])->name('api.san_pham_ban_chay');


