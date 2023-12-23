<?php

namespace App\Http\Controllers\Api\V1;


use App\Certificates;
use App\CrowdSourcing;
use App\DeviceToken;
use App\Education;
use App\Feed;
use App\FeedComment;
use App\Gym;
use App\GymClasses;
use App\GymClassesGallery;
use App\GymClassesTimings;
use App\GymGallery;
use App\GymTimings;
use App\SafeUser;
use App\Trainer;
use App\TrainerGallery;
use App\User;
use App\Notification;
use App\UserSubscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Matrix\Exception;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends ResponseController
{

    public function getProfile()
    {
        $this->sendResponse(200, __('api.succ'), $this->get_user_data());
    }

    //Set MPIN
    public function setMPIN(Request $request)
    {
        $user = $request->user();
        
       
        
        
        $this->directValidation([
            'mpin' => ['required'],
            'confirm_mpin' => ['required', 'same:mpin'],
        ]);

        $user->mpin = md5($request->mpin);
        $user->save();
        $this->sendResponse(200, __('api.succ_mpin_set'), $this->get_user_data());
    }

    //Login with MPIN
    public function loginWithMPIN(Request $request)
    {
         $user = $request->user();
        
        print_r($user);
        die;
    //   $user = DB::table('users')->where('id',1)->first();
        
        $this->directValidation([
            'mpin' => ['required'],
        ]);
        if (md5($request->mpin) === $user->mpin) {
            $this->sendResponse(200, __('api.suc_user_login'), $this->get_user_data());
        } else {
            $this->sendError(__('api.err_mpin_login'));
        }

    }

    //Edit profile
    public function editProfile(Request $request)
    {
        $user = Auth::user();

        $this->directValidation([
            'name' => ['required'],
            'username' => ['required', Rule::unique('users')->ignore($user->id,'id')],
        ]);

        if ($user->type != 'admin') {
            $this->directValidation([
                'country_code' => ['required'],
                'mobile' => ['required', Rule::unique('users')->ignore($user->id,'id')],
                'email' => ['required', Rule::unique('users')->ignore($user->id,'id')],
                'date_of_birth' => ['required'],
            ]);
            if ($user->type == 'state_user') {
                $this->directValidation([
                    'state' => ['required'],
                    'district' => ['required'],
                ]);
            }
        }

        $update_array = [
            'first_name' => $request->name ?? '',
            'last_name' => $request->name ?? '',
            'name' => $request->name ?? '',
            'username' => $request->username ?? '',
            'country_code' => '+91',
            'mobile' => $request->mobile ?? '',
            'email' => $request->email ?? '',
            'profile_image' => '',
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d') ?? '',
            'relative_mobile_number_1' => $request->relative_mobile_number_1 ?? '',
            'relative_mobile_number_2' => $request->relative_mobile_number_2 ?? '',
            'relative_mobile_number_3' => $request->relative_mobile_number_3 ?? '',
            'relative_mobile_number_4' => $request->relative_mobile_number_4 ?? '',
            'relative_mobile_number_5' => $request->relative_mobile_number_5 ?? '',
        ];
        if ($user->type == 'state_user') {
            $update_array['state'] = $request->state ?? '';
            $update_array['district'] = $request->district ?? '';
        }

        $user->update($update_array);

        $this->sendResponse(200, __('api.succ_profile_updated'), $this->get_user_data());
    }

    //logout
    public function logout(Request $request)
    {
        DeviceToken::where('token', get_header_auth_token())->delete();
        $this->sendResponse(200, __('api.succ_logout'), false);
    }

    public function deleteUser(request $request)
    {
        try {

            User::where(['id' => $request->id])->delete();

        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_user_delete'));
    }


    public function getNotificationCounts(Request $request)
    {
        $user = $this->get_user_data();
        $data['count']  = Notification::where('read','0')->where('user_id',$user['id'])->orderBy('id','desc')->count();
        $this->sendResponse(200, __('api.succ'), $data);
    }

    public function notificationList(Request $request)
    {
        $limit = (!empty($request->limit)) ? $request->limit : '10';
        $offset = (!empty($request->offset)) ? $request->offset : '0';
        $user = $this->get_user_data();
        Notification::where('read','0')->where('user_id',$user['id'])->update(['read'=>'1']);
        $data = [];
        $notification  = Notification::select('id','push_type','push_title','push_message','from_user_id','object_id','created_at')->where('user_id',$user['id'])->orderBy('id','desc')->limit($limit)->offset($offset)->get();

        if($notification)
        {
            foreach ($notification as $key => $value)
            {
                $data[$key]['id'] = $value->id;
                $data[$key]['push_type'] = $value->push_type;
                $data[$key]['title'] = $value->push_title;
                $data[$key]['message'] = $value->push_message;
                $data[$key]['from_user_id'] = $value->from_user_id;
                $data[$key]['object_id'] = $value->object_id;
                $data[$key]['created_at'] = date('Y-m-d H:i:s',strtotime($value->created_at));
                //$data[$key]['profile_image'] = $this->get_other_user_image($value->from_user_id);
            }
        }

        $this->sendResponse(200, __('api.succ'), $data);
    }
     public function deleteAccount(request $request)
    {
        try {
            CrowdSourcing::where(['user_id' => Auth::id()])->delete();
            FeedComment::where(['user_id' => Auth::id()])->delete();
            $feeds = Feed::where(['user_id' => Auth::id()])->get();
            foreach ($feeds as $key => $value) {
                FeedComment::where(['feed_id' => $value->id])->delete();
                Feed::destroy($value->id);
            }
            SafeUser::where(['user_id' => Auth::id()])->delete();
            DeviceToken::where('token', get_header_auth_token())->delete();
            User::destroy(Auth::id());

        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_act_deleted'));
    }
}
