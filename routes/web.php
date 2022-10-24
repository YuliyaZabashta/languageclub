<?php

use Illuminate\Support\Facades\DB;
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

Route::group([],function(){

    Route::match(['get','post'],'/',['uses'=>'App\Http\Controllers\IndexController@execute','as'=>'home']);

    Route::match(['get','post'],'/service',['uses'=>'App\Http\Controllers\ServiceController@execute','as'=>'service']);
    Route::match(['get','post'],'/service/feedback',['uses'=>'App\Http\Controllers\ServiceController@feedback','as'=>'service/feedback']);

});

Route::match(['get','post'],'/login', function () { return view('/auth/login'); })->name('login'); 

Route::group(['prefix'=>'admin'],function(){

    Route::get('/',function(){
        if(view()->exists('admin.index')){
            $neworders = DB::table('orders')->where('status', '=', 0)->get();
            $data = ['title' => 'Панель администратора',
                     'neworders'=>$neworders];
            return view('admin.index',$data);
        }

    })->middleware('auth');

    Route::group(['prefix'=>'services'],function(){

        Route::get('/',['uses'=>'App\Http\Controllers\ServicesController@execute','as'=>'services']);
        Route::match(['get','post'],'/add',['uses'=>'App\Http\Controllers\ServicesAddController@execute','as'=>'servicesAdd']);
        Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'App\Http\Controllers\ServicesEditController@execute','as'=>'servicesEdit']);
    });

    Route::match(['get','post','delete'],'/orders',['uses'=>'App\Http\Controllers\OrdersController@execute','as'=>'orders']);
    Route::match(['get','post','delete'],'/prices',['uses'=>'App\Http\Controllers\PricesController@execute','as'=>'prices']);
    Route::match(['get','post','delete'],'/prices/add',['uses'=>'App\Http\Controllers\PricesController@add','as'=>'pricesAdd']);

    
});
Route::post('/login',['uses'=>'App\Http\Controllers\Auth\LoginController@authenticate','as'=>'login']);
Route::get('/logout',['uses'=>'App\Http\Controllers\Auth\LoginController@logout','as'=>'logout']);
Route::get('/register',['uses'=>'App\Http\Controllers\Auth\RegisteredUserController@create']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
