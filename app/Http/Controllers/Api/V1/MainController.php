<?php

namespace App\Http\Controllers\Api\V1;

use App\DeviceToken;
use App\EquipmentAvailability;
use App\Facilities;
use App\Mail\General\SendFeedback;
use App\Mail\UserApprovedByAdmin;
use App\ManPower;
use App\Notification;
use App\SafeUser;
use App\User;
use App\Weather;
use App\DamageCause;
use App\CrowdSourcing;
use App\State;
use App\District;
use App\Feed;
use App\FeedComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Matrix\Exception;
use SebastianBergmann\Comparator\Book;
use Illuminate\Support\Facades\Mail;
use TextLocal;


class MainController extends ResponseController
{

    //Add Edit Admin User
    public function addEditAdminUser(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'id' => ['nullable', 'exists:users,id'],
            'name' => ['required'],
            'username' => ['required', Rule::unique('users')->where(function ($q) use ($request) {
                $q->where('id', '!=', $request->id);
            })],
            'email' => ['required', Rule::unique('users')->where(function ($q) use ($request) {
                $q->where('id', '!=', $request->id);
            })],
        ]);

        if (!empty($request->id)) {
            $user = User::find($request->id);
        } else {
            $this->directValidation(['password' => ['nullable', 'required'],]);
            $user = new User();
        }
        $user->email = $request->email;
        $user->type = 'admin';
        $user->name = $request->name;
        $user->username = $request->username;
        $user->country_code = '+91';
        $user->mobile = '';
        $user->profile_image = '';
        $user->password = $request->password;
        $user->save();

        $this->sendResponse(200, __('api.succ_add_edit_admin_user'));
    }

    //Add Edit State User
    public function addEditStateUser(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'id' => ['nullable', 'exists:users,id'],
            'name' => ['required'],
            'username' => ['required', Rule::unique('users')->where(function ($q) use ($request) {
                $q->where('id', '!=', $request->id);
            })],
            'mobile' => ['required', Rule::unique('users')->where(function ($q) use ($request) {
                $q->where('id', '!=', $request->id);
            })],
            'date_of_birth' => ['required'],
            'state' => ['required'],
            'district' => ['required'],
        ]);

        if (!empty($request->id)) {
            $user = User::find($request->id);
        } else {
            $this->directValidation(['password' => ['nullable', 'required'],]);

            $user = new User();
        }
        $user->email = '';
        $user->type = 'state_user';
        $user->first_name = $request->name;
        $user->last_name = $request->name;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->country_code = '+91';
        $user->mobile = $request->mobile;
        $user->profile_image = '';
        $user->password = $request->password;
        $user->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
        $user->relative_mobile_number_1 = $request->relative_mobile_number_1;
        $user->relative_mobile_number_2 = $request->relative_mobile_number_2;
        $user->relative_mobile_number_3 = $request->relative_mobile_number_3;
        $user->relative_mobile_number_4 = $request->relative_mobile_number_4;
        $user->relative_mobile_number_5 = $request->relative_mobile_number_5;
        $user->state = $request->state;
        $user->district = $request->district;
        $user->save();

        $this->sendResponse(200, __('api.succ_add_edit_state_user'));
    }

    //Get State User
    public function getStateUser(Request $request)
    {
        $user = $request->user();
        $state_users = User::where(['type' => 'state_user'])
            ->when(!empty($request->search), function ($q) use ($request) {
                $q->where('name', 'like', "%$request->search%");
            })->when($request->limit != "" && $request->offset != "", function ($q) use ($request) {
                $q->limit($request->limit)->offset($request->offset);
            })->when(!empty($request->state), function ($q) use ($request) {
                $q->where('state', $request->state);
            })->when(!empty($request->district), function ($q) use ($request) {
                $q->where('district', $request->district);
            })->whereNull('deleted_at')->get();
        $this->sendResponse(200, __('api.succ'), $state_users);
    }

    //Add Edit Disaster Manager
    public function addEditDisasterManager(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'id' => ['nullable', 'exists:users,id'],
            'name' => ['required'],
            'mobile' => ['required', Rule::unique('users')->where(function ($q) use ($request) {
                $q->where('id', '!=', $request->id);
            })],
            'state' => ['required'],
        ]);
        if (!empty($request->id))
            $user = User::find($request->id);
        else
            $user = new User();
        $user->email = '';
        $user->type = 'disaster_manager';
        $user->first_name = $request->name;
        $user->last_name = $request->name;
        $user->name = $request->name;
        $user->username = '';
        $user->country_code = '+91';
        $user->mobile = $request->mobile;
        $user->profile_image = '';
        $user->state = $request->state;
        $user->save();

        $this->sendResponse(200, __('api.succ_add_edit_disaster_user'));
    }

    //Get Disaster Manager
    public function getDisasterManager(Request $request)
    {
        $user = $request->user();
        $disaster_users = User::where(['type' => 'disaster_manager'])
            ->when(!empty($request->search), function ($q) use ($request) {
                $q->where('name', 'like', "%$request->search%");
            })->when($request->limit != "" && $request->offset != "", function ($q) use ($request) {
                $q->limit($request->limit)->offset($request->offset);
            })->when(!empty($request->state), function ($q) use ($request) {
                $q->where('state', $request->state);
            })->whereNull('deleted_at')->get();
        $this->sendResponse(200, __('api.succ'), $disaster_users);
    }

    //Get Unverified Users
    public function getVerificationRequest(Request $request)
    {
        $user = $request->user();
        $verification_request = User::where(['type' => 'user'])
            ->when(!empty($request->search), function ($q) use ($request) {
                $q->where('name', 'like', "%$request->search%");
            })->when($request->limit != "" && $request->offset != "", function ($q) use ($request) {
                $q->limit($request->limit)->offset($request->offset);
            })->where('is_verified', 0)->get();
        $this->sendResponse(200, __('api.succ'), $verification_request);
    }

    //Approved Reject Verification Request
    public function approvedRejectVerificationRequest(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'id' => ['required'],
            'is_approved' => ['required', 'in:1,2'],
        ]);
        $ids = explode(',', $request->id);

        if (!empty($ids)) {
            foreach ($ids as $key => $val) {
                $user = User::find($val);
                $user->is_verified = $request->is_approved;
                $user->save();
                try {
                    $emailData = [
                        'subject' => 'Account verification mail',
                        'user_name' => $user->name,
                        'account_status' => ($request->is_approved == 1) ? 'approved' : 'rejected'
                    ];
                    if (!empty($user->email))
                        Mail::to($user->email)->send(new UserApprovedByAdmin($emailData));
                    //Mail::to('premkiran.zestbrains@gmail.com')->send(new UserApprovedByAdmin($emailData));
                } catch (\Exception $e) {
                    //$this->sendError($e->getMessage());
                }
            }
        }

        if ($request->is_approved == 1)
            $this->sendResponse(200, __('api.succ_approve_request'));
        else
            $this->sendResponse(200, __('api.succ_reject_request'));
    }
    
    
    

    //Send Feedback
    public function sendFeedback(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'type' => ['required', 'in:comment,suggestion,question'],
            'description' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email'],
        ]);
        try {
            $emailData = [
                'type' => $request->type,
                'description' => $request->description,
                'name' => $request->name,
                'email' => $request->email,
                'user_id' => $user->id
            ];
            // Mail::to(ADMIN_EMAIL)->send(new SendFeedback($emailData));
            //  Mail::to(ADMIN_EMAIL)->send(new SendFeedback($emailData));
            
            DB::table('feedback')->insert($emailData);
            
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_feedback_post'));
    }
    
    
    
    
      public function getFeedback(Request $request)
    {
         $user = $request->user();

        $data =   DB::table('feedback')->where('user_id',$user->id)->get();
        $this->sendResponse(200, __('api.succ'), $data);
    }
    
    
    
    
    

    //Send Categorylist
    public function getCategoryList(Request $request)
    {
        $this->directValidation([
            'category_id' => ['required', 'in:1,2'],
        ]);
        try {
            $data = Weather::select('id', 'category_id', 'sub_category_name')->where(['status' => 'active'])->get();
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ'), $data);
    }

    //Send Categorylist
    public function getDamgeCause()
    {
        try {
            $data = DamageCause::select('id', 'cause_text')->where(['status' => 'active'])->get();
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ'), $data);
    }
    
    
    
    public function cyclone_alert(){
        
//      $filename = "ftp://rmsiftp:Rm$!#tP@103.215.208.96/imd_cyclone_alert/IMD_Alert.txt";
// $handle = fopen($filename, "IMD_Alert.txt");

// $contents = fread($handle, ($filename));
// fclose($handle);

// echo $contents;  


//   ob_end_flush();
    $conn_id = ftp_connect('103.215.208.96');

    $login_result = ftp_login($conn_id, 'rmsiftp', 'Rm$!#tP');

    ftp_pasv($conn_id, true);

    $h = fopen('php://temp', 'r+');

    ftp_fget($conn_id, $h, '/imd_cyclone_alert/IMD_Alert.txt', FTP_BINARY, 0);

    fseek($h, 0);

    while(!feof($h)) {
        $line = fgets($h);
        echo "$line";
    }

    fclose($h);
    ftp_close($conn_id);

       
        
        
    }
    
    
    

    //Send Feedback
    public function createCrowdSourcing(Request $request)
    {
        $damge_images = [];
        $user = Auth::user();

        $this->directValidation([
            'cyclone_name' => ['required'],
            // 'State' => ['required'],
            // 'District' => ['required'],
            'Date' => ['required'],
            'event_time' => ['required'],
            'weather_phenomena' => ['required'],
            // 'weather_phenomena_commnet' => ['required'],
            'flood_reason' => ['required'],
            // 'flood_reason_comment' => ['required'],
            // 'additional_damage_details' => ['required'],
            // 'questions_to_manager' => ['required'],
            // 'damage_cause' => ['required'],
            // 'damage_cause_comment' => ['required'],
            'damge_images[]' => ['file', 'images'],
            // 'damge_video' => ['nullable'],
        ]);
        try {
            if (!empty($request->id)) {
                $CrowdSourcing = CrowdSourcing::find($request->id);
            } else {
                $CrowdSourcing = new CrowdSourcing();
            }
            
            
          
          
            
             
            $w3='';
            if(!empty($request->damage_cause)){
            $w3 =  implode("|", $request->damage_cause);
            }
            
            
            
            

            $CrowdSourcing->user_id = $user->id;
            $CrowdSourcing->cyclone_name = $request->cyclone_name;
            $CrowdSourcing->state = $request->State;
            $CrowdSourcing->district = $request->District;
            $CrowdSourcing->date = $request->Date;
            $CrowdSourcing->event_time = $request->event_time;
            $CrowdSourcing->weather_phenomena = implode("|", $request->weather_phenomena);
            $CrowdSourcing->weather_phenomena_commnet = $request->weather_phenomena_commnet;
            $CrowdSourcing->flood_reason = implode("|", $request->flood_reason);
            $CrowdSourcing->flood_reason_comment = $request->flood_reason_comment;
            $CrowdSourcing->additional_damage_details = $request->additional_damage_details;
            $CrowdSourcing->questions_to_manager = $request->questions_to_manager;
            $CrowdSourcing->damage_cause = $w3;
            $CrowdSourcing->damage_cause_comment = $request->damage_cause_comment;
            $CrowdSourcing->location = DB::raw("GeomFromText('POINT(" . $request->long." ".$request->lat. ")')");
            
            $CrowdSourcing->damge_images = "";
            $CrowdSourcing->damge_video = "";
            if ($request->file('damge_images')) {
                $damge_images = upload_multipe_file('damge_images', 'damage_images', $user->id);
            }
            if ($request->hasFile('damge_video')) {
                $CrowdSourcing->damge_video = $request->damge_video->store('uploads/crowd_sourcing/damage_videos');
            }


            $CrowdSourcing->damge_images = implode("|", $damge_images);
            // if ($request->hasFile('damge_images')) {
            //     $CrowdSourcing->damge_images = $request->damge_images->store('uploads/crowd_sourcing/damge_images');
            // }
            // if ($request->hasFile('damge_video')) {
            //     $CrowdSourcing->damge_video = $request->damge_video->store('uploads/crowd_sourcing/damge_video');
            // }
            $CrowdSourcing->save();

            $data = $this->getCrowdSourcing($request, $CrowdSourcing->id);
        } catch (\Exception $e) {
            dd($e);
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_submit_crowd_sourcing'), $data);
    }

    //Crowd sourcing
    public function getCrowdSourcing(Request $request, $id = 0)
    {
        $data = [];
        try {
            if (isset($request->id)) {
                $id = $request->id;
            }
            $CrowdSourcing = CrowdSourcing::find($id);

            if ($CrowdSourcing) {
                $data['id'] = $CrowdSourcing->id;
                $data['cyclone_name'] = $CrowdSourcing->cyclone_name;
                $data['state'] = $CrowdSourcing->state;
                $data['district'] = $CrowdSourcing->district;
                $data['date'] = $CrowdSourcing->date;
                $data['event_time'] = $CrowdSourcing->event_time;
                $data['weather_phenomena'] = explode('|', $CrowdSourcing->weather_phenomena);
                $data['weather_phenomena_commnet'] = $CrowdSourcing->weather_phenomena_commnet;
                $data['flood_reason'] = explode('|', $CrowdSourcing->flood_reason);
                $data['flood_reason_comment'] = $CrowdSourcing->flood_reason_comment;
                $data['additional_damage_details'] = $CrowdSourcing->additional_damage_details;
                $data['questions_to_manager'] = $CrowdSourcing->questions_to_manager;
                $data['damage_cause'] = explode("|", $CrowdSourcing->damage_cause);
                $data['damage_cause_comment'] = $CrowdSourcing->damage_cause_comment;
                $data['questions_to_manager'] = $CrowdSourcing->questions_to_manager;
                $data['damge_video'] = ($CrowdSourcing->damge_video) ? asset($CrowdSourcing->damge_video) : "";
                $data['damge_images'] = [];
                if (!empty($CrowdSourcing->damge_images)) {
                    $image_array = explode('|', $CrowdSourcing->damge_images);

                    foreach ($image_array as $key => $value) {
                        $data['damge_images'][$key] = asset($value);
                    }
                }
            }

            if ($id && !isset($request->id)) {
                return $data;
            }
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_fetch_sourcing_detail'), $data);
    }

//get Crowd Sourcing
    public function getCrowdSourcingList(Request $request)
    {
        
       
        $CrowdSourcing = [];
        try {
            $user = Auth::user();
            //   $user = DB::table('users')->where('id',1)->first();
            
            $CrowdSourcing = CrowdSourcing::when($user->type != 'admin', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->when($request->limit != "" && $request->offset != "", function ($q) use ($request) {
                $q->limit($request->limit)->offset($request->offset);
            })->when(!empty($request->state), function ($q) use ($request) {
                $q->where('state', $request->state);
            })->when(!empty($request->district), function ($q) use ($request) {
                $q->where('district', $request->district);
            })
            
            ->with(['user'])->whereHas('user', function ($q) use ($request) {
                if (!empty($request->user)) {
                    $q->where('type', $request->user);
                }
            })->get();

            foreach ($CrowdSourcing as $key => $value) {
                $urlImage = [];
                 unset($value['location']);
                
              
                 
                //  unset($this->convert_from_latin1_to_utf8_recursively($value['location']));
                 
                $CrowdSourcing[$key]->weather_phenomena = explode('|', $value->weather_phenomena);
                $CrowdSourcing[$key]->weather_phenomena_commnet = $value->weather_phenomena_commnet;
                $CrowdSourcing[$key]->flood_reason = explode('|', $value->flood_reason);
                $CrowdSourcing[$key]->flood_reason_comment = $value->flood_reason_comment;
                $CrowdSourcing[$key]->additional_damage_details = $value->additional_damage_details;
                $CrowdSourcing[$key]->questions_to_manager = $value->questions_to_manager;
                $CrowdSourcing[$key]->damage_cause = explode("|", $value->damage_cause);
                $CrowdSourcing[$key]->damage_cause_comment = $value->damage_cause_comment;
                $CrowdSourcing[$key]->questions_to_manager = $value->questions_to_manager;
                $CrowdSourcing[$key]->damge_video = ($value->damge_video) ? asset($value->damge_video) : "";

                if (!empty($value->damge_images)) {
                    $image_array = explode('|', $value->damge_images);

                    foreach ($image_array as $ikey => $ivalue) {
                        $urlImage[$ikey] = asset($ivalue);
                    }
                }

                $CrowdSourcing[$key]->damge_images = $urlImage;
            }
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        
        // print_r($CrowdSourcing);
        
        // die();
        
        $this->sendResponse(200, __('api.succ'), $CrowdSourcing);
    }
    
    
    
    public static function convert_from_latin1_to_utf8_recursively($dat)
{
   if (is_string($dat)) {
      return utf8_encode($dat);
   } elseif (is_array($dat)) {
      $ret = [];
      foreach ($dat as $i => $d) $ret[ $i ] = self::convert_from_latin1_to_utf8_recursively($d);

      return $ret;
   } elseif (is_object($dat)) {
      foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);

      return $dat;
   } else {
      return $dat;
   }
}
    
    
    
    
    
    

    public function deleteCrowdSourcing(Request $request)
    {
        $this->directValidation([
            'id' => 'required',
        ]);
        $data = [];
        try {

            CrowdSourcing::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_delete_sourcing'), $data);
    }

    //Send Feedback
    public function getStateDistrict(Request $request)
    {
        $data = [];
        try {
            $State = State::select('id', 'state_name')->where('status', 'active');
            if (isset($request->state_id)) {
                $State->where('id', $request->state_id);
            }

            $state_list = $State->get();

            foreach ($state_list as $key => $value) {
                $data[$key] = $value;
                $data[$key]['district'] = District::select('id', 'state_id', 'district_name')->where(['status' => 'active', 'state_id' => $value->id])->get();
            }
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_state_list'), $data);
    }

    //Send Feed
    public function createFeed(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'feed_text' => ['required'],
            'state' => ['required'],
            'district' => ['required'],
        ]);
        try {
            if (!empty($request->id))
                $Feed = Feed::find($request->id);
            else
                $Feed = new Feed();

            $Feed->user_id = $user->id;
            $Feed->feed_text = $request->feed_text;
            $Feed->state = $request->state;
            $Feed->district = $request->district;
            $Feed->created_at = date('Y-m-d H:i:s');
            $Feed->save();

            $data = $this->getFeedData($Feed->id);
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_feed'), $data);
    }

    public function addEditComment(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'comment_text' => ['required'],
            'feed_id' => ['required'],
        ]);
        try {
            if (!empty($request->id))
                $Feed = FeedComment::find($request->id);
            else
                $Feed = new FeedComment();

            $Feed->user_id = $user->id;
            $Feed->comment_text = $request->comment_text;
            $Feed->feed_id = $request->feed_id;
            $Feed->created_at = date('Y-m-d H:i:s');
            $Feed->save();

            $feed_data = $this->getFeedData($request->feed_id);

            if ($feed_data['user_id'] != $user->id) {
                $push_data = [
                    'user_id' => $feed_data['user_id'],
                    'from_user_id' => $user->id,
                    'sound' => 'defualt',
                    'badge' => '1',
                    'push_type' => 1,
                    'push_title' => 'Comment on your feed',
                    'push_message' => $user->name . ' commented on your feed',
                    'object_id' => $request->feed_id,
                ];
                send_push($feed_data['user_id'], $push_data);
            }
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_feed_comment'));
    }

    public function getCommentList(Request $request)
    {
        $this->directValidation([
            'id' => ['required'],
        ]);
        $user = $request->user();
        $offset = (!empty($request->offset)) ? $request->offset : 0;
        $limit = (!empty($request->limit)) ? $request->limit : 10;
        $data = [];
        try {

            $Feed = FeedComment::whereNull('deleted_at')->where(['feed_id' => $request->id])->offset($offset)->limit($limit)->get();

            foreach ($Feed as $key => $value) {
                $commenter = User::where('id', $value->user_id)->first();
                $data[$key]['id'] = $value->id;
                $data[$key]['comment_text'] = $value->comment_text;
                $data[$key]['feed_id'] = $value->feed_id;
                $data[$key]['date'] = $value->created_at;
                $data[$key]['name'] = $commenter->name;
                $data[$key]['user_id'] = $value->user_id;
                $data[$key]['user_state'] = $commenter->state;
                $data[$key]['user_district'] = $commenter->district;
                $data[$key]['profile_image'] = $commenter->profile_image;
            }
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_comment'), $data);
    }

    //Add Feed
    public function getFeedDetails(Request $request, $id = 0)
    {
        $user = $request->user();
        $data = [];
        try {
            if (isset($request->id)) {
                $id = $request->id;
            }

            $data = $this->getFeedData($id);
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_feed_detail'), $data);
    }

    protected function getFeedData($id)
    {
        $user = Auth::user();
        $Feed = Feed::find($id);
        $posted_by = User::where('id', $Feed->user_id)->first();

        $data['id'] = $Feed->id;
        $data['feed_text'] = $Feed->feed_text;
        $data['state'] = $Feed->state;
        $data['district'] = $Feed->district;
        $data['date'] = $Feed->created_at;
        $data['user_id'] = $Feed->user_id;
        $data['name'] = $posted_by->name;
        $data['user_state'] = $posted_by->state;
        $data['user_district'] = $posted_by->district;
        $data['profile_image'] = $posted_by->profile_image;

        return $data;
    }

    public function getFeedList(request $request)
    {
        $user = $request->user();
        $whrArray = [];
        /* if($user->type != 'admin')
          {
          if (!empty($user->state))
          $whrArray['feeds.state'] = $user->state;
          if (!empty($user->district))
          $whrArray['feeds.district'] = $user->district;
          } */
        $offset = (!empty($request->offset)) ? $request->offset : 0;
        $limit = (!empty($request->limit)) ? $request->limit : 10;
        $data = [];
//        try {
        if ($request->type == 'public') {
            if (!empty($request->state_filter)) {
                $whrArray['feeds.state'] = $request->state_filter;
            }
            if (!empty($request->district_filter)) {
                $whrArray['feeds.district'] = $request->district_filter;
            }
            if (!empty($request->search)) {
                $whrArray['users.name'] = $request->search;
                $Feed = Feed::select('feeds.*')->leftJoin('users', 'users.id', '=', 'feeds.user_id')->whereNull('feeds.deleted_at')->where($whrArray);
            } else {
                $Feed = Feed::whereNull('feeds.deleted_at')->where($whrArray);
            }

            $Feed = $Feed->offset($offset)->limit($limit)->get();
        } else {
            $Feed = Feed::whereNull('deleted_at')->where(['user_id' => $user->id])->offset($offset)->limit($limit)->get();
        }
        foreach ($Feed as $key => $value) {
            $created_by_user = User::where('id', $value->user_id)->first();
            $data[$key]['id'] = $value->id;
            $data[$key]['feed_text'] = $value->feed_text;
            $data[$key]['state'] = $value->state;
            $data[$key]['district'] = $value->district;
            $data[$key]['date'] = $value->created_at;
            $data[$key]['user_id'] = $value->user_id;
            $data[$key]['comments'] = FeedComment::whereNull('deleted_at')->where('feed_id', $value->id)->count();
            $data[$key]['name'] = $created_by_user->name ?? '';
            $data[$key]['user_state'] = $created_by_user->state ?? '';
            $data[$key]['user_district'] = $created_by_user->district ?? '';
            $data[$key]['profile_image'] = $created_by_user->profile_image ?? '';
        }
//        } catch (\Exception $e) {
//            $this->sendError($e->getMessage());
//        }
        $this->sendResponse(200, __('api.succ_feed_list'), $data);
    }

    public function deleteFeed(request $request)
    {
        try {

            Feed::where(['id' => $request->id])->delete();
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_feed_delete'));
    }

    public function deleteComment(request $request)
    {
        try {

            FeedComment::where(['id' => $request->id])->delete();
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_comment_delete'));
    }

    //Safe Not Safe
    public function safeOrNotSafe(Request $request)
    {
       $user = $request->user();
        
        // $user = DB::table('users')->where('id',1)->first();
        
        
        $this->directValidation([
            'is_safe' => ['required'],
        ]);
        $mobile_nos = [];
        if (!empty($user->relative_mobile_number_1))
            $mobile_nos[] = $user->relative_mobile_number_1;
        if (!empty($user->relative_mobile_number_2))
            $mobile_nos[] = $user->relative_mobile_number_2;
        if (!empty($user->relative_mobile_number_3))
            $mobile_nos[] = $user->relative_mobile_number_3;
        if (!empty($user->relative_mobile_number_4))
            $mobile_nos[] = $user->relative_mobile_number_4;
        if (!empty($user->relative_mobile_number_5))
            $mobile_nos[] = $user->relative_mobile_number_5;
        if ($request->is_safe == 0) {
            $disasterManager = User::where('state', $user->state)->where('type', 'disaster_manager')->first();
            if (!is_null($disasterManager))
                $mobile_nos[] = $disasterManager->mobile;
        }
        try {
            
            $audioName ='';
            if ($request->has('audio')) {
        $audioName = time().'.'.$request->audio->extension();  
        $request->audio->move('public/uploads/recording', $audioName);
            }
            
            
            $safeUsers = new SafeUser();
            $safeUsers->user_id = $user->id;
            $safeUsers->location = DB::raw("GeomFromText('POINT(" . $request->location . ")')");
            $safeUsers->reason = $request->reason;
            $safeUsers->mobile = $request->mobile;
            $safeUsers->type = ($request->is_safe == 'no') ? 'unsafe' : 'safe';
            $safeUsers->recording = url('uploads/recording/').'/'.$audioName;
            $safeUsers->save();
            if ($request->is_safe == 'no') {
                $message = 'Hello,
                
                
                
                I AM NOT SAFE

Here mentioned below my current location for your information

Link :- https://www.google.co.in/maps/@' . $request->lat . ',' . $request->lng . ',15z';
                
                
                


            } else {
                $message = 'Hello,
                
                
                I AM SAFE

Here mentioned below my current location for your information .

Link :- https://www.google.co.in/maps/@' . $request->lat . ',' . $request->lng . ',15z
 Optout: Text N4ELPSTOP to 919220592205';


            }
            if (!empty($mobile_nos))
                $response = sendTextLocalSMS($mobile_nos, $message);
            $this->sendResponse(200, __('api.succ'));
        } catch (\Exception $e) {
            $this->sendError($e->getMessage());
        }
        $this->sendResponse(200, __('api.succ_comment'), $data);
    }
    
    
    
    
    
    
    
    
    
    
    

    public function sendSms()
    {
        $message = 'Hello,

I AM SAFE

Here mentioned below my current location for your information .

Link :- https://www.google.co.in/maps/@23.0208636,72.5091974,15z
 Optout: Text N4ELPSTOP to 919220592205';
        sendTextLocalSMS(['917046314518'], $message);
        return TextLocal::sendSms(['919773239952'], "Hello,

I AM SAFE

Here mentioned below my current location for your information .

Link :- https://www.google.co.in/maps/@23.0208636,72.5091974,15z
 Optout: Text N4ELPSTOP to 919220592205", "RMSICN");
    }

    //Add Edit Man Power
    public function addEditManPower(Request $request)
    {
        $this->directValidation([
            'id' => ['nullable', 'exists:man_powers,id'],
            'name' => ['required'],
            'department_type' => ['required'],
            'department_name' => ['required'],
            'designation' => ['required'],
            'skills' => ['required'],
            'age' => ['required'],
            'mobile' => ['required'],
            'status' => ['required'],
            'remark' => ['nullable'],
        ]);

        if (!empty($request->id))
            $manPower = ManPower::find($request->id);
        else
            $manPower = new ManPower();
        $manPower->name = $request->name;
        $manPower->department_type = $request->department_type;
        $manPower->department_name = $request->department_name;
        $manPower->designation = $request->designation;
        $manPower->skills = $request->skills;
        $manPower->age = $request->age;
        $manPower->mobile = $request->mobile;
        $manPower->status = $request->status;
        $manPower->remark = $request->remark;
        $manPower->save();

        $this->sendResponse(200, __('api.succ_add_edit_man_power'));
    }

    //Get Man Power
    public function getManPower(Request $request)
    {
        $man_power = ManPower::when(!empty($request->search), function ($q) use ($request) {
            $q->where('name', 'like', "%$request->search%");
            $q->orWhere('department_type', 'like', "%$request->search%");
            $q->orWhere('department_name', 'like', "%$request->search%");
        })->when(!empty($request->filter_by), function ($q) use ($request) {
            $q->whereRaw('FIND_IN_SET(?, skills)', [$request->filter_by]);
        })->when($request->limit != "" && $request->offset != "", function ($q) use ($request) {
            $q->limit($request->limit)->offset($request->offset);
        })->get();
        $this->sendResponse(200, __('api.succ'), $man_power);
    }

    //Delete Man Power
    public function deleteManPower(Request $request)
    {
        $this->directValidation([
            'id' => ['required', 'exists:man_powers,id'],
        ]);
        ManPower::destroy($request->id);
        $this->sendResponse(200, __('api.succ_man_power_delete'));
    }

    //Add Edit Equipment Availability
    public function addEditEquipmentAvailability(Request $request)
    {
        $this->directValidation([
            'id' => ['nullable', 'exists:equipment_availabilities,id'],
            'name' => ['required'],
            'department_type' => ['required'],
            'department_name' => ['required'],
            'type' => ['required'],
            'category' => ['required'],
            'condition' => ['required'],
            'year' => ['required'],
            'remark' => ['nullable'],
        ]);

        if (!empty($request->id))
            $equipmentAvailability = EquipmentAvailability::find($request->id);
        else
            $equipmentAvailability = new EquipmentAvailability();
        $equipmentAvailability->name = $request->name;
        $equipmentAvailability->department_type = $request->department_type;
        $equipmentAvailability->department_name = $request->department_name;
        $equipmentAvailability->type = $request->type;
        $equipmentAvailability->category = $request->category;
        $equipmentAvailability->condition = $request->condition;
        $equipmentAvailability->year = $request->year;
        $equipmentAvailability->remark = $request->remark;
        $equipmentAvailability->save();

        $this->sendResponse(200, __('api.succ_add_edit_eqp_ava'));
    }

    //Get Equipment Availability
    public function getEquipmentAvailability(Request $request)
    {
        $equipment_availability = EquipmentAvailability::when(!empty($request->search), function ($q) use ($request) {
            $q->where('name', 'like', "%$request->search%");
            $q->orWhere('department_type', 'like', "%$request->search%");
            $q->orWhere('department_name', 'like', "%$request->search%");
        })->when(!empty($request->filter_by), function ($q) use ($request) {
            $q->where('category', $request->filter_by);
        })->when($request->limit != "" && $request->offset != "", function ($q) use ($request) {
            $q->limit($request->limit)->offset($request->offset);
        })->get();
        $this->sendResponse(200, __('api.succ'), $equipment_availability);
    }

    //Delete Equipment Availability
    public function deleteEquipmentAvailability(Request $request)
    {
        $this->directValidation([
            'id' => ['required', 'exists:equipment_availabilities,id'],
        ]);
        EquipmentAvailability::destroy($request->id);
        $this->sendResponse(200, __('api.succ_eqp_ava_delete'));
    }

}
