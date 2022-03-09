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

Route::get('/', function () {
    return view('home', [
        "title" => "home"
    ]);
});

Route::get('/dashboard', function () {
    return view('admin/dashboard', ["title" => "Dashboard"]);
});

Route::get('/admin/users', function () {
    return view('admin/users');
});

Route::get('/admin/event', function () {
    return view('admin/event');
});

Route::get('/admin/dataCustomer', function () {
    $datas = DB::table('customers')->get();
    return view('admin/dataCustomer',['customer' => $datas] );
});

Route::prefix('admin')->namespace('App\Http\Controllers')->group(function () {
    Route::resource('users', 'UserController');
});

Route::prefix('admin')->namespace('App\Http\Controllers')->group(function () {
    Route::resource('event', 'EventController');
});

Route::prefix('admin')->namespace('App\Http\Controllers')->group(function () {
    Route::resource('dataCustomer', 'DataCustomerController');
});
