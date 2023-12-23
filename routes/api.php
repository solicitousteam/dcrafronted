<?php

use Illuminate\Support\Facades\Route;
use App\TextLocalApi\TextLocal;



  


Route::group(['namespace' => 'Api\V1', 'prefix' => 'V1'], function () {
    //   Route::post('check', 'GuestController@check');
    
     Route::post('create_crowd_sourcing2', 'MainController@createCrowdSourcing');
     
      Route::post('get_crowd_sourcing2', 'MainController@getCrowdSourcingList');

    Route::post('login', 'GuestController@login');
    Route::post('social_login', 'GuestController@check_social_ability');
    Route::post('social_register', 'GuestController@social_register');
    Route::get('content/{type}', 'GuestController@content');
    Route::post('sign_up', 'GuestController@sign_up');
    Route::get('content/{type}', 'GuestController@content');
    Route::post('version_checker', 'GuestController@version_checker');

    Route::post('reset_password_by_id', 'GuestController@resetPasswordByID');
    Route::post('get_kml_to_json', 'GuestController@getKMLtoJson');
    Route::get('send_sms', 'MainController@sendSms');
    Route::get('send_otp_test', 'GuestController@sendOTPByTextLocal');
    Route::post('get_location', 'GuestController@getLocation');
          Route::post('send_otp', 'GuestController@sendOTPByTextLocal');
    Route::post('verify_otp', 'GuestController@verifyOTP');
    Route::post('resendOTP', 'GuestController@resendOTP');
    
    
       Route::post('cyclone_alert', 'MainController@cyclone_alert');

     Route::group(['middleware' => 'ApiTokenChecker'], function () {
    
    
    
        Route::group(['prefix' => 'user'], function () {
            Route::get('getProfile', 'UserController@getProfile');
            Route::post('notification_list', 'UserController@notificationList');
            Route::post('edit_profile', 'UserController@editProfile');
            Route::post('set_mpin', 'UserController@setMPIN');
            Route::post('login_with_mpin', 'UserController@loginWithMPIN');
            Route::get('logout', 'UserController@logout');
            Route::post('delete_user', 'UserController@deleteUser');
            Route::get('get_notification_counts', 'UserController@getNotificationCounts');
            Route::get('delete_account', 'UserController@deleteAccount');
        });
        Route::group(['prefix' => 'main'], function () {
            //State Management
            Route::post('get_state_user', 'MainController@getStateUser');
            Route::post('add_edit_state_user', 'MainController@addEditStateUser');

            //Admin User Management
            Route::post('add_edit_admin_user', 'MainController@addEditAdminUser');

            //Disaster Management
            Route::post('get_disaster_manager', 'MainController@getDisasterManager');
            Route::post('add_edit_disaster_manager', 'MainController@addEditDisasterManager');

            //Verification Request
            Route::post('get_verification_request', 'MainController@getVerificationRequest');
            Route::post('approved_reject_verification_request', 'MainController@approvedRejectVerificationRequest');

            //send feedback
            Route::post('send_feedback', 'MainController@sendFeedback');
            Route::get('get_feedback', 'MainController@getFeedback');

            // CategoryList
            Route::post('get_category_list', 'MainController@getCategoryList');
            Route::get('get_damage_cause', 'MainController@getDamgeCause');
            Route::post('get_state_district', 'MainController@getStateDistrict');
            Route::post('create_crowd_sourcing', 'MainController@createCrowdSourcing');
            Route::post('get_crowd_sourcing', 'MainController@getCrowdSourcingList');
            Route::post('crowd_sourcing_detail', 'MainController@getCrowdSourcing');
            Route::post('delete_crowd_sourcing', 'MainController@deleteCrowdSourcing');


            // Feed
            Route::post('create_feed', 'MainController@createFeed');
            Route::post('add_edit_comment', 'MainController@addEditComment');
            Route::post('comment_list', 'MainController@getCommentList');
            Route::post('delete_comment', 'MainController@deleteComment');
            Route::post('get_feed_details', 'MainController@getFeedDetails');
            Route::post('get_feed_list', 'MainController@getFeedList');
            Route::post('delete_feed', 'MainController@deleteFeed');

            //Safe or Not Safe
            Route::post('safe_or_not_safe', 'MainController@safeOrNotSafe');

            //Man Power Management
            Route::post('get_man_power', 'MainController@getManPower');
            Route::post('delete_man_power', 'MainController@deleteManPower');
            Route::post('add_edit_man_power', 'MainController@addEditManPower');

            //Equipment Availability
            Route::post('get_equipment_availability', 'MainController@getEquipmentAvailability');
            Route::post('delete_equipment_availability', 'MainController@deleteEquipmentAvailability');
            Route::post('add_edit_equipment_availability', 'MainController@addEditEquipmentAvailability');
        });
        
        
      });
    
    
});


