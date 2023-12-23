<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
    return abort(404);
});
Route::get('send-sms',function (){
//    $message = 'Hello, My name is x here I AM NOT SAFE Here mentioned below my current location for your information Link :- x -RMSI';
    $message = 'Hello, My name is x here I AM NOT SAFE Here mentioned below my current location for your information Link :- x -RMSI';
    pre(sendTextLocalSMS(['8200919538'],$message));
});
Route::get('/signup', function () {
    return abort(404);
})->name('referral_signup');


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cleared!";
});
Route::get('/cache', function () {
    Artisan::call('config:cache');
});

Route::group(['as' => 'front.'], function () {
    Route::get('/', function () {
        return abort(404);
    })->name('dashboard');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/user_availability_checker', 'General\GeneralController@user_availability_checker')->name('user_availability_checker');
        Route::get('/logout', 'General\GeneralController@logout')->name('logout');
    });

    Route::get('availability_checker', 'General\GeneralController@availability_checker')->name('availability_checker');
    Route::get('forgot_password/{token}', 'General\GeneralController@forgot_password_view')->name('forgot_password_view');
    Route::post('forgot_password', 'General\GeneralController@forgot_password_post')->name('forgot_password_post');
});
