<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);

Route::group(['middleware' => ['jwt.verify:admin,kasir,owner']], function () {
    Route::post('user', [UserController::class, 'insert']);
    Route::get('user/login/check', [UserController::class,'loginCheck']);
    Route::post('user/logout', [UserController::class,'logout']);

    Route::get('outlet', [OutletController::class, 'getAll']); //get all
    Route::get('outlet/{id_outlet}', [OutletController::class, 'getById']); //get by ID
     //REPORT
     Route::post('transaksi/report', [TransaksiController::class, 'report']); //get report
});

Route::group(['middleware' => ['jwt.verify:admin,kasir']], function () {
    Route::post('member', [MemberController::class, 'insert']);
    Route::put('member/{id}', [MemberController::class, 'update']);
    Route::delete('member/{id}', [MemberController::class, 'delete']);
    Route::get('member', [MemberController::class, 'getAll']); //get all
    Route::get('member/{id_member}', [MemberController::class, 'getById']); //get by ID

    Route::post('transaksi', [TransaksiController::class, 'insert']);
    Route::put('transaksi/status', [TransaksiController::class, 'update_status']);
    Route::put('transaksi/bayar', [TransaksiController::class, 'update_bayar']);

    Route::post('paket', [PaketController::class, 'insert']);
    Route::put('paket/{id}', [PaketController::class, 'update']);
    Route::delete('paket/{id}', [PaketController::class, 'delete']);
    Route::get('paket', [PaketController::class, 'getAll']); //get all
    Route::get('paket/{id_paket}', [PaketController::class, 'getById']); //get by ID
});

route::group(['middleware' => ['jwt.verify:admin']], function () {
    // Route::post('user', [UserController::class, 'insert']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'delete']);
    Route::get('user', [UserController::class, 'getAll']); //get all
    Route::get('user/{id_user}', [UserController::class, 'getById']); //get by ID

    Route::post('outlet', [OutletController::class, 'insert']);
    Route::put('outlet/{id}', [OutletController::class, 'update']);
    Route::delete('outlet/{id}', [OutletController::class, 'delete']);
    
});


// // User Routers
// Route::post('user/register', [UserController::class, 'register']);
// Route::post('user/login', [UserController::class, 'login']);
// // Route::put('user/{id}', [UserController::class, 'update']);

// Route::get('user/login/check', [UserController::class, 'loginCheck']);
// Route::post('user/logout', [UserController::class, 'logout']);

// // Member Routers
// Route::group(['middleware' => ['jwt.verify:admin']], function () {
//     Route::post('transaksi', [TransaksiController::class, 'insert']);
//     Route::put('transaksi/status', [TransaksiController::class, 'update_status']);
//     Route::put('transaksi/bayar', [TransaksiController::class, 'update_bayar']);

//     Route::post('transaksi/report', [TransaksiController::class, 'report']);

//     Route::post('member', [MemberController::class, 'insert']);
//     Route::put('member/{id_member}', [MemberController::class, 'update']);
//     Route::delete('member/{id_member}', [MemberController::class, 'delete']);
//     Route::get('member', [MemberController::class, 'getAll']);
//     Route::get('member/{id_member}', [MemberController::class, 'getById']);
// });

// // Paket Routers
// Route::post('paket', [PaketController::class, 'insert']);
// Route::put('paket/{id_paket}', [PaketController::class, 'update']);
// Route::delete('paket/{id_paket}', [PaketController::class, 'delete']);
// Route::get('paket', [PaketController::class, 'getAll']);
// Route::get('paket/{id_paket}', [PaketController::class, 'getById']);

// // 
// Route::post('user', [UserController::class, 'insert']);
// Route::delete('user/{id_user}', [UserController::class, 'delete']);
// Route::put('user/{id}', [UserController::class, 'update']);
// Route::get('user', [UserController::class, 'getAll']);
// Route::get('user/{id_user}', [UserController::class, 'getById']);



// // Outlet Routers
// Route::group(['middleware' => ['jwt.verify:admin']], function () {
//     Route::post('outlet', [OutletController::class, 'insert']);
//     Route::put('outlet/{id_outlet}', [OutletController::class, 'update']);
//     Route::delete('outlet/{id_outlet}', [OutletController::class, 'delete']);
//     Route::get('outlet', [OutletController::class, 'getAll']);
//     Route::get('outlet/{id_outlet}', [OutletController::class, 'getById']);
// });
