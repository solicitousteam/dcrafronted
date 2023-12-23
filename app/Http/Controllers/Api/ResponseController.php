<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Countries;
use App\Gym;
use App\Http\Controllers\Controller as Controller;
use App\User;
use App\UserBank;
use App\UserCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResponseController extends Controller
{

    public $errors;

    public function __construct()
    {
        $this->errors = null;
    }

    public function apiValidation($rules, $messages = [], $data = null)
    {
        $data = ($data) ? $data : request()->all();
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            $this->errors = $validator->errors()->first();
            return false;
        } else {
            return true;
        }
    }

    public function directValidation($rules, $messages = [], $direct = true, $data = null)
    {
        $data = ($data) ? $data : request()->all();
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            $this->errors = $validator->errors()->first();
            if ($direct) {
                $this->sendError(null, null);
            } else {
                return false;
            }
        } else {
            //            return true;
            return $validator->valid();
        }
    }

    public function sendError($message = null, $array = true)
    {
        $empty_object = new \stdClass();
        $message = ($this->errors) ? $this->errors : ($message ? $message : __('api.err_something_went_wrong'));
        send_response(412, $message, ($array) ? [] : $empty_object);
    }

    public function sendResponse($status, $message, $result = null, $extra = null)
    {
        $empty_object = new \stdClass();
//        $data = ($result) ? $empty_object : $result;
//        send_response($status, $message, $data, $extra, ($status != 401));
        send_response($status, $message, $result, $extra, ($status != 401));
    }

    public function get_user_data($token = null)
    {
        $user_data = Auth::user()->fresh();

        return [
            'id' => $user_data->id,
            'type' => $user_data->type,
            'name' => $user_data->name,
            'username' => $user_data->username,
            'country_code' => $user_data->country_code,
            'mobile' => $user_data->mobile,
            'email' => $user_data->email,
            'date_of_birth' => $user_data->date_of_birth,
            'profile_image' => $user_data->profile_image,
            'state' => $user_data->state,
            'district' => $user_data->district,
            'relative_mobile_number_1' => $user_data->relative_mobile_number_1,
            'relative_mobile_number_2' => $user_data->relative_mobile_number_2,
            'relative_mobile_number_3' => $user_data->relative_mobile_number_3,
            'relative_mobile_number_4' => $user_data->relative_mobile_number_4,
            'relative_mobile_number_5' => $user_data->relative_mobile_number_5,
            'mpin' => $user_data->mpin,
            'is_verified' => $user_data->is_verified,
            'token' => ($token) ? $token : get_header_auth_token(),
        ];
    }

    public function upload_file($file_name = "", $path = "")
    {
        $file = "";
        $request = \request();
        if ($request->hasFile($file_name) && $path) {
            $path = config('constants.upload_paths.' . $path);
            $file = $request->file($file_name)->store($path, config('constants.upload_type'));
        } else {
            echo 'Provide Valid Const from web controller';
            die();
        }
        return $file;
    }

    public function get_push_type($type = 'default')
    {
        $push_types = [
            'default' => 0,
            'send_request' => 1,
            'approve_request' => 2,
            'reject_request' => 3,
            'post_booking' => 4,
        ];
        return $push_types[$type];
    }

}
