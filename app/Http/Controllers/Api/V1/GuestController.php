<?php

namespace App\Http\Controllers\Api\V1;

use App\Content;
use App\Http\Controllers\Api\ResponseController;
use App\User;
use App\SocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Matrix\Exception;
use Authy;
use Authy\AuthyApi;
use App\DeviceToken;
use Illuminate\Http\Response;
class GuestController extends ResponseController
{

    public function content($type)
    {
        $data = Content::where('slug', $type)->first();
        return ($data) ? $data->content : "Invalid Content type passed";
    }
    
    
    
//     public function check(Request $request)
//     {
        
       
//  $token = get_header_auth_token();
 
//  print_r($token);
        
        
      
        
        
//     }
    
    
    
    
    
    
    
    

    public function login(Request $request)
    {
        $rules = [
            'username' => ['required'],
            'password' => ['required'],
            'push_token' => ['nullable'],
            'device_type' => ['required', 'in:android,ios'],
            'device_id' => ['required', 'max:255'],
        ];
        $messages = [];
        $this->directValidation($rules, $messages);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            Auth::loginUsingId(Auth::user()->id);
            $token = User::AddTokenToUser();
            $this->sendResponse(200, __('api.suc_user_login'), $this->get_user_data($token));
        } else {
            $this->sendError(__('api.err_fail_to_auth'), false);
        }

    }

    public function sign_up(Request $request)
    {
        $valid = $this->directValidation([
            'push_token' => ['nullable'],
            'name' => ['required'],
            'username' => ['required', Rule::unique('users')->where('is_verified', '1')],
            'country_code' => ['required'],
            'mobile' => ['required', Rule::unique('users')->where('is_verified', '1')],
            'email' => ['required', Rule::unique('users')->where('is_verified', '1')],
            'date_of_birth' => ['required'],
            'password' => ['required'],
            'device_id' => ['required', 'max:255'],
            'device_type' => ['required', 'in:android,ios'],
        ]);
        $user = User::create([
            'first_name' => $request->name,
            'last_name' => $request->name,
            'name' => $request->name,
            'username' => $request->username,
            'country_code' => '+91',
            'mobile' => $request->mobile,
            'email' => $request->email,
            'profile_image' => '',
            'password' => $request->password,
            'gender' => $request->gender,
            'address' => $request->address,
            'mobile2' => $request->mobile2,
            'relative1_name' => $request->relative1_name,
            'relative2_name' => $request->relative2_name,
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
            'relative_mobile_number_1' => $request->relative_mobile_number_1,
            'relative_mobile_number_2' => $request->relative_mobile_number_2,
            'relative_mobile_number_3' => $request->relative_mobile_number_3,
            'relative_mobile_number_4' => $request->relative_mobile_number_4,
            'relative_mobile_number_5' => $request->relative_mobile_number_5,
        ]);
        if ($user) {
            /* Auth::loginUsingId($user->id);
             $token = User::AddTokenToUser();*/
            /*$this->sendResponse(200, __('api.suc_user_register'), $this->get_user_data($token));*/
            $this->sendResponse(200, __('api.suc_user_register'));
        } else {
            $this->sendError(__('api.err_something_went_wrong'), false);
        }
    }

    public function check_ability(Request $request)
    {
        $otp = "";
        $type = $request->type;
        $is_sms_need = $request->is_sms_need;
        $rules = [
            'type' => ['required', 'in:username,email,mobile_number'],
            'value' => ['required'],
            'country_code' => ['required_if:type,mobile']
        ];
        $user_id = $request->user_id;
        if ($type == "email") {
            $rules['value'][] = 'email';
            $rules['value'][] = Rule::unique('users', 'email')->ignore($user_id)->whereNull('deleted_at');
        } elseif ($type == "username") {
            $rules['value'][] = 'regex:/^\S*$/u';
            $rules['value'][] = Rule::unique('users', 'username')->ignore($user_id)->whereNull('deleted_at');
        } else {
            $rules['value'][] = 'integer';
            $rules['value'][] = Rule::unique('users', 'mobile')->ignore($user_id)->where('country_code', $request->country_code)->whereNull('deleted_at');
        }
        $this->directValidation($rules, ['regex' => __('api.err_space_not_allowed'), 'unique' => __('api.err_field_is_taken', ['attribute' => str_replace('_', ' ', $type)])]);
        $this->sendResponse(200, __('api.succ'));
    }

    public function version_checker(Request $request)
    {
        $type = $request->type;
        $version = $request->version;
        $this->directValidation([
            'type' => ['required', 'in:android,ios'],
            'version' => 'required',
        ]);
        $data = [
            'is_force_update' => ($type == "ios") ? IOS_Force_Update : Android_Force_Update,
        ];
        $check = ($type == "ios") ? (IOS_Version <= $version) : (Android_Version <= $version);
        if ($check) {
            $this->sendResponse(200, __('api.succ'), $data);
        } else {
            $this->sendResponse(412, __('api.err_new_version_is_available'), $data);
        }

    }

    //send OTP
    public function sendOTP(Request $request)
    {
        $validationArray = [
            'country_code' => ['required', 'max:4'],
            'mobile' => ['required', 'integer', 'exists:users']
        ];
        $valid = $this->directValidation($validationArray, ['mobile.exists' => __('api.user_not_exist')]);
        $authy_api = new Authy\AuthyApi(env('AUTHY_KEY', '6vtINbuPxqgk3EXZnPj2wzbn46fn2NPWa'));
        $user = $authy_api->registerUser($request->mobile . '@gmail.com', $request->mobile, $request->country_code); // email, cellphone, country_code
        if ($user->ok()) {
            $sms = $authy_api->requestSms($user->id());
            if ($sms->ok()) {
                $user_data = User::where(['country_code' => $request->country_code, 'mobile' => $request->mobile])->first();
                return $this->sendResponse(200, __('api.send_otp_success'), [
                    'otp' => $user->id(),
                    'user_id' => (isset($user_data)) ? (int)$user_data->id : 0,
                ]);
            } else {
                return $this->sendError(__('api.send_otp_error'), false);
            }
        } else {
            return $this->sendError(__('api.send_otp_error'), false);
        }
    }
    
    
    
    
    
    
    
    
    
    

    //send OTP
    // public function sendOTPByTextLocal(Request $request)
    // {
        
         
        
    //     $validationArray = [
    //         'country_code' => ['required', 'max:4'],
    //         'mobile' => ['required', 'integer', 'exists:users']
    //     ];
    //     $valid = $this->directValidation($validationArray, ['mobile.exists' => __('api.user_not_exist')]);
    //     $user_data = User::where(['mobile' => $request->mobile])->first();
    //     if ($user_data) {
    //         $otp = rand(111111, 999999);
    //         $sms = sendTextLocalSMS([$request->country_code . $request->mobile], 'Your OTP for PINCER is ' . $otp . ' - RMSI');
    //         if (isset($sms['status']) && $sms['status'] == 200) {
    //             return $this->sendResponse(200, __('api.send_otp_success'), [
    //                 'otp' => $otp,
    //                 'user_id' => (isset($user_data)) ? (int)$user_data->id : 0,
    //             ]);
    //         } else {
    //             return $this->sendError(__('api.send_otp_error'), false);
    //         }
    //     } else {
    //         return $this->sendError(__('api.send_otp_error'), false);
    //     }
    // }
    
    //     public function sendOTPByTextLocal(Request $request)
    // {
        
         
        
    //     $validationArray = [
    //         'country_code' => ['required', 'max:4'],
    //         'mobile' => ['required', 'integer', 'exists:users']
    //     ];
    //     //$valid = $this->directValidation($validationArray, ['mobile.exists' => __('api.user_not_exist')]);
    //     $user_data = User::where(['mobile' => $request->mobile])->first();
        
    //     if(!empty($user_data)){
        
    //         $otp = rand(111111, 999999);
    //         $sms = sendTextLocalSMS([$request->country_code . $request->mobile], 'Your OTP for PINCER is ' . $otp . ' - RMSI');
    //         if (isset($sms['status']) && $sms['status'] == 200) {
    //             return $this->sendResponse(200, __('api.send_otp_success'), [
    //                 'otp' => $otp
  
    //             ]);
                
    //                           $expFormat = mktime(
    //          date("H"), date("i")+15, date("s"), date("m"), date("d"), date("Y")
    //      );
 
    //      $expDate = date("Y-m-d H:i:s",$expFormat);
                
    //           $userdata = User::where(['mobile' => $request->mobile])->first();
    //           $userdata->otp = $otp;
    //           $userdata->exptime=$expDate;
    //             $userdata->save();
                
                
    //         }
         
         
         
         
         
    //     }else {
    //           $otp = rand(111111, 999999);
    //         $sms = sendTextLocalSMS([$request->country_code . $request->mobile], 'Your OTP for PINCER is ' . $otp . ' - RMSI');
    //         if (isset($sms['status']) && $sms['status'] == 200) {
    //             return $this->sendResponse(200, __('api.send_otp_success'), [
    //                 'otp' => $otp
  
    //             ]);
                
    //                           $expFormat = mktime(
    //          date("H"), date("i")+15, date("s"), date("m"), date("d"), date("Y")
    //      );
 
    //      $expDate = date("Y-m-d H:i:s",$expFormat);
                
    //           $userdata = new User;
    //           $userdata->otp = $request->mobile;
    //           $userdata->mobile = $otp;
    //           $userdata->exptime=$expDate;
    //             $userdata->save();
                
                
    //         }
            
            
            
            
    //         // return $this->sendError(__('api.send_otp_error'), false);
    //     }
    // }
public function sendOTPByTextLocal(Request $request)
{
    $validationArray = [
        'country_code' => ['required', 'max:4'],
        'mobile' => ['required', 'integer', 'exists:users']
    ];

    // Validate the request data here
    //$validator = Validator::make($request->all(), $validationArray);

    // if ($validator->fails()) {
    //     return $this->sendError('Validation error', $validator->errors(), 400);
    // }

    // Generate OTP
    $otp = rand(111111, 999999);

    // Send SMS
    $sms = sendTextLocalSMS([$request->country_code . $request->mobile], 'Your OTP for PINCER is ' . $otp . ' - RMSI');

    if (isset($sms['status']) && $sms['status'] == 200) {
        // SMS sent successfully
        $expDate = Carbon::now()->addMinutes(5);

        // Update or create user data
        $user = User::where(['mobile' => $request->mobile])->first();

        if (!$user) {
            // Create a new user if not found
            $user = new User;
            $user->mobile = $request->mobile;
            
            
        }

        // Update user data
        $user->country_code = $request->country_code;
        $user->otp = $otp;
        $user->exptime = $expDate;
        $user->save();
        
        
        $response = new Response();
         $response->cookie('mobile', $request->mobile, 5);
      $response->setContent([
            'status' => 200,
            'message' => __('api.send_otp_success'),
            'otp' => $otp
        ]);

        return $response;
    } else {
        // SMS sending failed
        return $this->sendError(__('api.send_otp_error'), false);
    }
} 








    
    

    //Verify OTP
    // public function verifyOTP(Request $request)
    // {
    //     $valid = $this->directValidation([
    //         'auth_id' => ['required'],
    //         'otp' => ['required'],
    //     ]);
    //     $authy_api = new Authy\AuthyApi(env('AUTHY_KEY', '6vtINbuPxqgk3EXZnPj2wzbn46fn2NPWa'));
    //     try {
    //         $verification = $authy_api->verifyToken($request->auth_id, $request->otp);
    //         if ($verification->ok()) {
    //             return $this->sendResponse(200, __('api.verify_otp_success'), false);
    //         } else {
    //             return $this->sendError(__('api.verify_otp_error'), false);
    //         }
    //     } catch (Authy\AuthyFormatException $e) {
    //         return $this->sendError($e->getMessage(), false);
    //     }

    // }
    
    
    
   public function verifyOTP(Request $request)
{
    // // Retrieve user by mobile number (or email)
     $userId = $request->cookie('mobile');
    
     $user = User::where('mobile', $userId)->first();
     if(empty($user)){
         return response()->json(['message' => 'Invalid OTP','status'=>400]);
         
        }else{
         
             if ($user->otp == $request->otp && Carbon::now() <= $user->exptime) {
        // OTP is valid
        $user->otp = null; // Clear the OTP after successful verification
        $user->exptime = null;
        $user->save();
        $response = new Response();
        $response->cookie('mobile', '', -1);
        
        
            $response->setContent([
            'status' => 200,
            'message' => 'OTP verified successfully',
        ]);
        
          return $response;

        
    } else {
        // OTP is invalid or has expired
        return response()->json(['message' => 'Invalid OTP','status'=>400]);
    }

     }

 
    // Check if OTP matches and has not expired

}




public function resendOTP(Request $request)
{
    // Retrieve user by mobile number (or email)
    //  $user = User::where('otp', $request->otp)->first();

 $userId = $request->cookie('mobile');
 
 
  

 $otp = rand(111111, 999999);

    // Send SMS
    $sms = sendTextLocalSMS([$userId], 'Your OTP for PINCER is ' . $otp . ' - RMSI');

    if (isset($sms['status']) && $sms['status'] == 200) {
        // SMS sent successfully
        $expDate = Carbon::now()->addMinutes(5);
        // Update or create user data
        $user = User::where(['mobile' => $userId])->first();

     
        $user->otp = $otp;
        $user->exptime = $expDate;
        $user->save();
        
        


        return $this->sendResponse(200, __('api.send_otp_success'), [
            'otp' => $otp
        ]);
    } else {
        // SMS sending failed
        return $this->sendError(__('api.send_otp_error'), false);
    }
}



    //Reset Password with id
    public function resetPasswordByID(Request $request)
    {
        $this->directValidation([
            'id' => ['required', 'exists:users'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);
        $user = User::find($request->id);
        $user->password = $request->password;
        $user->save();
        $this->sendResponse(200, __('api.succ_password_updated'));
    }

    //get kml to json
    public function getKMLtoJson(Request $request)
    {
        $dom = new \DOMDocument();
        $dom->loadXml(public_path('uploads/AMC.kml'));
        $xpath = new \DOMXPath($dom);
        $xpath->registerNamespace('kml', 'http://www.opengis.net/kml/2.2');

        $result = array();
        $places = $xpath->evaluate('//kml:Placemark', NULL, FALSE);
        foreach ($places as $place) {
            $coord = $xpath->evaluate('string(kml:LineString/kml:coordinates)', $place, FALSE);
            $i = explode("\n", $coord);
            $result = array(
                'name' => $xpath->evaluate('string(kml:name)', $place, FALSE),
                'coords' => explode("\n", $coord, count($i)
                )
            );
        }
        pre($result);
        $this->sendResponse(200, __('api.succ'));
    }


    public function check_social_ability(Request $request)
    {
        $user_id = 0;
        $email = $request->email;
        $provider = $request->type;
        $social_id = $request->social_id;
        $this->directValidation([
            'type' => ['required', 'in:facebook,apple,google'],
            'social_id' => ['required'],
            'device_id' => ['required'],
//            'name' => ['required'],
            'device_type' => ['required', 'in:android,ios'],
            'email' => ['nullable', 'email'],
            'push_token' => ['nullable'],
        ]);
        if ($email) {
            $is_user_exits = User::where(['email' => $email])->first();
            if ($is_user_exits) {
                if ($is_user_exits->status == "active") {
                    $user_id = $is_user_exits->id;
                } else {
                    $this->sendResponse(412, __('api.err_account_ban'));
                }
            }
        }
        if (!$user_id) {
            $is_user_exits = SocialAccount::where(['provider' => $provider, 'provider_id' => $social_id])
                ->has('user')->with('user')->first();
            if ($is_user_exits) {
                if ($is_user_exits->user->status == "active") {
                    $user_id = $is_user_exits->user_id;
                } else {
                    $this->sendResponse(412, __('api.err_account_ban'));
                }
            }
        }

//        if (!$user_id) {
//            $user_data = User::create([
//                'name' => $request->name,
//                'email' => $email ?? "",
//                'profile_image' => config('constants.default.user_image'),
//                'referral_code' => User::get_unique_referral_code(),
//            ]);
//            if ($user_data) {
//                $user_id = $user_data->id;
//            } else {
//                $this->sendResponse(412, __('api.err_something_went_wrong'));
//            }
//        }
        if ($user_id) {
            Auth::loginUsingId($user_id);
            Auth::user()->social_logins()->updateOrCreate(
                ['provider' => $provider, 'user_id' => $user_id],
                ['provider' => $provider, 'provider_id' => $social_id]
            );
            $token = User::AddTokenToUser();
            $this->sendResponse(200, __('api.suc_user_login'), $this->get_user_data($token));
        } else {
            $this->sendResponse(412, __('api.err_please_register_social'));
        }
    }

    public function social_register(Request $request)
    {
        $provider = $request->type;
        $social_id = $request->social_id;
        $this->directValidation([
            'push_token' => ['nullable'],
            'name' => ['required'],
            'username' => ['required', Rule::unique('users')],
            'country_code' => ['required'],
            'mobile' => ['required', Rule::unique('users')],
            'email' => ['required', Rule::unique('users')],
            'date_of_birth' => ['required'],
            'device_id' => ['required', 'max:255'],
            'device_type' => ['required', 'in:android,ios'],
            'type' => ['required', 'in:facebook,apple,google'],
            'social_id' => ['required'],
        ]);
        $user = User::create([
            'first_name' => $request->name,
            'last_name' => $request->name,
            'name' => $request->name,
            'username' => $request->username,
            'country_code' => '+91',
            'mobile' => $request->mobile,
            'email' => $request->email,
            'profile_image' => '',
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
            'relative_mobile_number_1' => $request->relative_mobile_number_1,
            'relative_mobile_number_2' => $request->relative_mobile_number_2,
            'relative_mobile_number_3' => $request->relative_mobile_number_3,
            'relative_mobile_number_4' => $request->relative_mobile_number_4,
            'relative_mobile_number_5' => $request->relative_mobile_number_5,
        ]);
        if ($user) {
            Auth::loginUsingId($user->id);
            $token = User::AddTokenToUser();
            Auth::user()->social_logins()->updateOrCreate(
                ['provider' => $provider, 'user_id' => $user->id],
                ['provider' => $provider, 'provider_id' => $social_id]
            );
            $this->sendResponse(200, __('api.suc_user_register'), $this->get_user_data($token));
        } else {
            $this->sendError(__('api.err_something_went_wrong'), false);
        }
    }

    public function getLocation(Request $request)
    {
        $valid = $this->directValidation([
            'lat' => ['required'],
            'lng' => ['required'],
        ]);
        try {
            $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $request->lat . ',' . $request->lng . '&key=AIzaSyADwVAs3Cw91cxbvW2cztgbhvDavFI3Pro';
            $json = @file_get_contents($url);
            return $this->sendResponse(200, __('api.succ'), \GuzzleHttp\json_decode($json));
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), false);
        }

    }
}

