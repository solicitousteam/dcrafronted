<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest', 'namespace' => 'General'], function () {
    Route::post('login', function () {
        return abort(404);
    })->name('login_post');
    Route::get('login',  function () {
        return abort(404);
    })->name('login');

	Route::get('forgot_password',  function () {
        return abort(404);
    })->name('forgot_password');

    Route::post('forgot_password', 'GeneralController@ForgetPassword')->name('forgot_password_post');
});

Route::group(['middleware' => 'Is_Admin'], function () {
    Route::get('/', 'General\GeneralController@Admin_dashboard')->name('dashboard');
    Route::get('/profile', 'General\GeneralController@get_profile')->name('profile');
    Route::post('/profile', 'General\GeneralController@post_profile')->name('post_profile');
    Route::get('/update_password', 'General\GeneralController@get_update_password')->name('get_update_password');
    Route::post('/update_password', 'General\GeneralController@update_password')->name('update_password');
    Route::get('/site_settings', 'General\GeneralController@get_site_settings')->name('get_site_settings');
    Route::post('/site_settings', 'General\GeneralController@site_settings')->name('site_settings');
    Route::group(['namespace' => 'Admin'], function () {
//        User Module
        Route::get('user/listing', 'UsersController@listing')->name('user.listing');
        Route::get('user/export', 'UsersController@export')->name('user.export');
        Route::resource('user', 'UsersController')->except(['create', 'store']);
        Route::get('user/status_update/{id}', 'UsersController@status_update')->name('user.status_update');
        Route::get('user/status_update/{id}/{status}', 'UsersController@approvedRejectTrainer')->name('user.approve_reject_trainer');

        //Gym Classes Module
        Route::get('gym_classes/listing', 'GymClassesController@listing')->name('gym_classes.listing');
        Route::resource('gym_classes', 'GymClassesController')->except(['create', 'store']);

        //User Subscription
        Route::get('user_subscription/listing', 'UserSubscriptionController@listing')->name('user_subscription.listing');
        Route::resource('user_subscription', 'UserSubscriptionController')->except(['create', 'store']);

        //Review
        Route::get('review/listing', 'ReviewController@listing')->name('review.listing');
        Route::resource('review', 'ReviewController')->except(['create', 'store']);

        //Bookings
        Route::get('booking/listing', 'BookingsController@listing')->name('booking.listing');
        Route::resource('booking', 'BookingsController')->except(['create', 'store']);
        Route::post('booking/get_booking_details', 'BookingsController@getBookingDetails')->name('booking.get_booking_details');

        //Voucher Module
        Route::get('voucher/listing', 'VoucherController@listing')->name('voucher.listing');
        Route::resource('voucher', 'VoucherController')->except(['show']);
        Route::get('voucher/status_update/{id}', 'VoucherController@status_update')->name('voucher.status_update');

        //Transaction Module
        Route::get('transaction/listing', 'TransactionController@listing')->name('transaction.listing');
        Route::resource('transaction', 'TransactionController')->except(['show']);

        //Payout Module
        Route::get('payout/listing', 'PayoutController@listing')->name('payout.listing');
        Route::resource('payout', 'PayoutController')->except(['show']);
        Route::get('payout/status_paid/{id}', 'PayoutController@status_paid')->name('payout.status_paid');


        //Banner Module
        Route::get('banner/listing', 'BannerController@listing')->name('banner.listing');
        Route::resource('banner', 'BannerController');
        Route::get('banner/status_update/{id}', 'BannerController@status_update')->name('banner.status_update');

        //Content Module
        Route::resource('content', 'ContentController')->except(['show', 'create', 'store', 'destroy']);
        Route::get('content/listing', 'ContentController@listing')->name('content.listing');
    });
});

