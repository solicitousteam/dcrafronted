<?php

use App\DeviceToken;
use App\Notification;
use App\PushLog;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Twilio\Rest\Client;

if (!function_exists('send_response')) {

    function send_response($Status, $Message = "", $ResponseData = NULL, $extraData = NULL, $null_remove = null)
    {
        $data = [];
        $valid_status = [412, 200, 401];
        if (is_array($ResponseData)) {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = $ResponseData;
        } else if (!empty($ResponseData)) {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = $ResponseData;
        } else {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = new stdClass();
        }
        if (!empty($extraData) && is_array($extraData)) {
            foreach ($extraData as $key => $val) {
                $data[$key] = $val;
            }
        }
        $header_status = in_array($data['status'], $valid_status) ? $data['status'] : 412;
        response()->json($data, $header_status)->header('Content-Type', 'application/json')->send();
        die(0);
    }
}


function null_remover($response, $ignore = [])
{
    array_walk_recursive($response, function (&$item) {
        if (is_null($item)) {
            $item = strval($item);
        }
    });
    return $response;
}

function token_generator()
{
    return genUniqueStr('', 100, 'device_tokens', 'token', true);
}

function get_header_auth_token()
{
    $full_token = request()->header('Authorization');
    return (substr($full_token, 0, 7) === 'Bearer ') ? substr($full_token, 7) : null;
}

if (!function_exists('un_link_file')) {
    function un_link_file($image_name = "")
    {
        $pass = true;
        if (!empty($image_name)) {
            try {
                $default_url = URL::to('/');
                $get_default_images = config('constants.default');
                $file_name = str_replace($default_url, '', $image_name);
                $default_image_list = is_array($get_default_images) ? str_replace($default_url, '', array_values($get_default_images)) : [];
                if (!in_array($file_name, $default_image_list)) {
                    Storage::disk(get_constants('upload_type'))->delete($file_name);
                }
            } catch (Exception $exception) {
                $pass = $exception;
            }
        } else {
            $pass = 'Empty Field Name';
        }
        return $pass;
    }
}


function get_asset($val = "")
{
    return asset($val);
}

function print_title($title)
{
    return ucfirst($title);
}

function get_constants($name)
{
    return config('constants.' . $name);
}

function calculate_percentage($amount = 0, $discount = 0)
{
    return ($amount && $discount) ? (($amount * $discount) / 100) : 0;
}

function flash_session($name = "", $value = "")
{
    session()->flash($name, $value);
}

function success_session($value = "")
{
    session()->flash('success', ucfirst($value));
}

function error_session($value = "")
{
    session()->flash('error', ucfirst($value));
}

function getDashboardRouteName()
{
    $name = 'front.dashboard';
    $user_data = Auth::user();
    if ($user_data) {
        if (in_array($user_data->type, ["admin", "local_admin"])) {
            $name = 'admin.dashboard';
        }
    }
    return $name;
}

function admin_modules()
{
    return [
        [
            'route' => route('admin.dashboard'),
            'name' => __('Dashboard'),
            'icon' => 'kt-menu__link-icon fa fa-home',
            'child' => [],
            'all_routes' => [
                'admin.dashboard',
            ]
        ],
        [
            'route' => route('admin.user.index'),
            'name' => __('User'),
            'icon' => 'kt-menu__link-icon fas fa-users',
            'child' => [],
            'all_routes' => [
                'admin.user.index',
                'admin.user.show',
                'admin.user.add',
            ]
        ],
        [
            'route' => route('admin.gym_classes.index'),
            'name' => __('Gym Classes'),
            'icon' => 'kt-menu__link-icon fas fa-user-graduate',
            'child' => [],
            'all_routes' => [
                'admin.gym_classes.index',
                'admin.gym_classes.show'
            ]
        ],
        [
            'route' => route('admin.user_subscription.index'),
            'name' => __('User Subscription'),
            'icon' => 'kt-menu__link-icon fab fa-cc-apple-pay',
            'child' => [],
            'all_routes' => [
                'admin.user_subscription.index'
            ]
        ],
        [
            'route' => route('admin.voucher.index'),
            'name' => __('Voucher'),
            'icon' => 'kt-menu__link-icon fas fa-gift',
            'child' => [],
            'all_routes' => [
                'admin.voucher.index',
                'admin.voucher.add',
            ]
        ],
        [
            'route' => route('admin.booking.index'),
            'name' => __('Bookings'),
            'icon' => 'kt-menu__link-icon fas fa-book',
            'child' => [],
            'all_routes' => [
                'admin.booking.index'
            ]
        ],
        [
            'route' => route('admin.review.index'),
            'name' => __('Review'),
            'icon' => 'kt-menu__link-icon fas fa-star',
            'child' => [],
            'all_routes' => [
                'admin.review.index'
            ]
        ],
        [
            'route' => route('admin.banner.index'),
            'name' => __('Banners'),
            'icon' => 'kt-menu__link-icon fa fa-file-image',
            'child' => [],
            'all_routes' => [
                'admin.banner.index',
                'admin.banner.add',
                'admin.banner.edit',
            ]
        ],
        [
            'route' => route('admin.content.index'),
            'name' => 'Content',
            'icon' => 'kt-menu__link-icon fas fa-text-height',
            'child' => [],
            'all_routes' => [
                'admin.content.index',
                'admin.content.create',
                'admin.content.edit',
            ],
        ],
        [
            'route' => 'javascript:;',
            'name' => __('General Settings'),
            'icon' => 'kt-menu__link-icon fa fa-home',
            'all_routes' => [
                'admin.get_update_password',
                'admin.get_site_settings',
            ],
            'child' => [
                [
                    'route' => route('admin.get_update_password'),
                    'name' => 'Change Password',
                    'icon' => '',
                    'all_routes' => [
                        'admin.get_update_password',
                    ],
                ],
                [
                    'route' => route('admin.get_site_settings'),
                    'name' => 'Site Settings',
                    'icon' => '',
                    'all_routes' => [
                        'admin.get_site_settings',
                    ],
                ]
            ],
        ],
        [
            'route' => route('front.logout'),
            'name' => __('logout'),
            'icon' => 'kt-menu__link-icon fas fa-sign-out-alt',
            'child' => [],
            'all_routes' => [],
        ],
    ];
}


function get_error_html($error)
{
    $content = "";
    if ($error->any() !== null && $error->any()) {
        foreach ($error->all() as $key => $value) {
            $content .= '<div class="alert alert-danger alert-dismissible mb-1" role="alert">';
            $content .= '<div class="alert-text">' . $value . '</div>';
            $content .= '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>';
            $content .= '</div>';
        }

    }
    return $content;
}


function breadcrumb($aBradcrumb = array())
{
    $content = '';
    $is_login = Auth::user();
    if ($is_login && $is_login->type == "admin") {
        $aBradcrumb = array_merge(['Home' => route('admin.dashboard')], $aBradcrumb);
    } else {
        $aBradcrumb = array_merge(['Home' => route('vendor.dashboard')], $aBradcrumb);
    }
    ob_start();
    if (count($aBradcrumb) > 0) {
        ?>
        <?php
        $i = 1;
        foreach ($aBradcrumb as $key => $link) {
            ?>
            <a href="<?php echo $link != '' ? $link : 'javascript:void(0)'; ?>"
               class="kt-subheader__breadcrumbs-link"><?php echo ucfirst($key); ?></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <?php
            $i++;
        }
        ?>
        <?php
    }
    $content = ob_get_clean();
    return $content;
}

function success_error_view_generator()
{
    $content = "";
    if (session()->has('error')) {
        $content = '<div class="alert alert-danger alert-dismissible" role="alert">
                                        <div class="alert-text">' . session('error') . '</div>
                                        <div class="alert-close"><i class="flaticon2-cross kt-icon-sm"
                                                                    data-dismiss="alert"></i></div></div>';
    } elseif (session()->has('success')) {
        $content = '<div class="alert alert-success alert-dismissible" role="alert">
                                        <div class="alert-text">' . session('success') . '</div>
                                        <div class="alert-close"><i class="flaticon2-cross kt-icon-sm"
                                                                    data-dismiss="alert"></i></div></div>';
    }
    return $content;
}

function datatable_filters()
{
    $post = request()->all();
    return array(
        'offset' => isset($post['start']) ? intval($post['start']) : 0,
        'limit' => isset($post['length']) ? intval($post['length']) : 25,
        'sort' => isset($post['columns'][(isset($post["order"][0]['column'])) ? $post["order"][0]['column'] : 0]['data']) ? $post['columns'][(isset($post["order"][0]['column'])) ? $post["order"][0]['column'] : 0]['data'] : 'created_at',
        'order' => isset($post["order"][0]['dir']) ? $post["order"][0]['dir'] : 'DESC',
        'search' => isset($post["search"]['value']) ? $post["search"]['value'] : '',
        'sEcho' => isset($post['sEcho']) ? $post['sEcho'] : 1,
    );
}

function send_push($user_id = 0, $data = [], $notification_entry = TRUE)
{
    $main_name = 'DCRA';
    if (isset($push_data['push_title']) && empty($push_data['push_title']) && \Illuminate\Support\Facades\Auth::check()) {
        $user_data = \Illuminate\Support\Facades\Auth::user();
        if (!empty($user_data) && $user_data['user_type'] !== "admin") {
            $main_name = isset($data['name']) ? $data['name'] : (isset($user_data->name) ? $user_data->name : $main_name);
        }
    }
    $push_data = [
        'user_id' => $user_id,
        'from_user_id' => isset($data['from_user_id']) ? $data['from_user_id'] : 0,
        'sound' => 'defualt',
        'badge' => '1',
        'push_type' => isset($data['push_type']) ? $data['push_type'] : 0,
        'push_title' => isset($data['push_title']) ? $data['push_title'] : $main_name,
        'push_message' => isset($data['push_message']) ? $data['push_message'] : "",
        'object_id' => isset($data['object_id']) ? $data['object_id'] : 0,
    ];
    $Notification_push_data = [
        'user_id' => $user_id,
        'from_user_id' => isset($data['from_user_id']) ? $data['from_user_id'] : 0,
        'sound' => 'defualt',
        'badge' => '1',
        'push_type' => isset($data['push_type']) ? $data['push_type'] : 0,
        'title' => isset($data['push_title']) ? $data['push_title'] : $main_name,
        'body' => isset($data['push_message']) ? $data['push_message'] : "",
        'object_id' => isset($data['object_id']) ? $data['object_id'] : 0,
    ];
    $push_data['push_message'] = (strpos($push_data['push_message'], ':user') !== false) ? __($push_data['push_message'], ['user' => $main_name]) : $push_data['push_message'];
    if (isset($data['extra']) && !empty($data['extra'])) {
        $push_data = array_merge($push_data, $data['extra']);
    }
    if ($push_data['user_id'] !== $push_data['from_user_id']) {
        $to_user_data = \App\User::find($user_id);
        if ($to_user_data) {
            $push_status = "Sent";
            $get_user_tokens = \App\DeviceToken::get_user_tokens($user_id);

            $headers = array("Authorization: key=" . config('constants.firebase_server_key'), "Content-Type: application/json");
            if (count($get_user_tokens)) {
                foreach ($get_user_tokens as $key => $value) {
                    if ($value['push_token']) {
                        $result = '';
                        $device_type = strtolower($value['type']);
                        if ($device_type == "ios") {
                            try {
                                $device_token = $value['push_token'];
                                $pem_file = base_path('storage/app/notification.pem');
                                $bundle_id = 'com.dev.app.Reposted';
                                $pem_secret = '';
                                $url = "https://api.development.push.apple.com/3/device/$device_token";
                                $ch = curl_init($url);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                                    'aps' => [
                                        'badge' => +1,
                                        'alert' => [
                                            'title' => $push_data['push_title'],
                                            'body' => $push_data['push_message'],
                                        ],
                                        'sound' => 'default',
                                        'push_type' => $push_data['push_type']
                                    ],
                                    'payload' => [
                                        'to' => $value['push_token'],
                                        'notification' => ['title' => $push_data['push_title'], 'body' => $push_data['push_message'], "sound" => "default", "badge" => 1],
                                        'data' => $push_data,
                                        'priority' => 'high'
                                    ]
                                ]));
                                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array("apns-topic: $bundle_id"));
                                curl_setopt($ch, CURLOPT_SSLCERT, $pem_file);
                                curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $pem_secret);
                                $response = curl_exec($ch);
                                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                //                       dd(curl_error($ch));
                                if ($httpcode != 200) {
                                    if (config('constants.push_log')) {
                                        \App\PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], $push_status, json_encode($push_data), $response);
                                    }
                                } else {
                                    if (config('constants.push_log')) {
                                        \App\PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], $push_status, json_encode($push_data), $response);
                                    }
                                }
                            } catch (Exception $e) {
                                if (config('constants.push_log')) {
                                    \App\PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], $e->getMessage());
                                }
                            }
                        } else {

                            $ch = curl_init();
                            $Notification_push_data["badge"] = 1;
                            $payload_data = [
                                'to' => $value['push_token'],
                                'data' => $push_data,
                                'notification' => $Notification_push_data,
                                'priority' => 'high'
                            ];
                            curl_setopt_array($ch, array(
                                CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
                                CURLOPT_RETURNTRANSFER => 1,
                                CURLOPT_POSTFIELDS => json_encode($payload_data),
                                CURLOPT_POST => 1,
                                CURLOPT_HTTPHEADER => $headers,
                            ));
                            $result = curl_exec($ch);
                            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);;
                            if (curl_errno($ch)) {
                                $code = '412';
                                $push_status = 'Curl Error:' . curl_error($ch);
                            }
                            curl_close($ch);

                            //pre($result);
                            $push_data['push_token'] = $value['push_token'];
                            $push_data['FCM KEY'] = config('constants.firebase_server_key');

                            if (config('constants.push_log')) {
                                \App\PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], $push_status, json_encode($push_data), $result);
                            }
                        }
                    }
                }
            } else {
                if (config('constants.push_log')) {
                    \App\PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], "Token Is Empty");
                }
            }

            if ($notification_entry) {
                Notification::create([
                    'push_type' => $push_data['push_type'],
                    'user_id' => $push_data['user_id'],
                    'from_user_id' => $push_data['from_user_id'],
                    'push_title' => $push_data['push_title'],
                    'push_message' => $push_data['push_message'],
                    'object_id' => $push_data['object_id'],
                    'extra' => (isset($data['extra']) && !empty($data['extra'])) ? json_encode($data['extra']) : json_encode([]),
                ]);
            }
        }
    } else {
        if (config('constants.push_log')) {
            \App\PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], "User Cant Sent Push To Own Profile.");
        }
    }
}

function number_to_dec($number = "", $show_number = 2, $separated = '.', $thousand_separator = "")
{
    return number_format($number, $show_number, $separated, $thousand_separator);
}

function genUniqueStr($prefix = '', $length = 10, $table, $field, $isAlphaNum = false)
{
    $arr = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
    if ($isAlphaNum) {
        $arr = array_merge($arr, array(
            'a', 'b', 'c', 'd', 'e', 'f',
            'g', 'h', 'i', 'j', 'k', 'l',
            'm', 'n', 'o', 'p', 'r', 's',
            't', 'u', 'v', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F',
            'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'O', 'P', 'R', 'S',
            'T', 'U', 'V', 'X', 'Y', 'Z'));
    }
    $token = $prefix;
    $maxLen = max(($length - strlen($prefix)), 0);
    for ($i = 0; $i < $maxLen; $i++) {
        $index = rand(0, count($arr) - 1);
        $token .= $arr[$index];
    }
    if (isTokenExist($token, $table, $field)) {
        return genUniqueStr($prefix, $length, $table, $field, $isAlphaNum);
    } else {
        return $token;
    }
}

function isTokenExist($token, $table, $field)
{
    if ($token != '') {
        $isExist = DB::table($table)->where($field, $token)->count();
        if ($isExist > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function get_fancy_box_html($path = "", $class = "")
{
    return '<a data-fancybox="gallery" href="' . $path . '"><img class="' . $class . '" src="' . $path . '" alt="image"></a>';
}

function general_date($date)
{
    return date('Y-m-d', strtotime($date));
}

function current_route_is_same($name = "")
{
    return $name == request()->route()->getName();
}

function is_selected_blade($id = 0, $id2 = "")
{
    return ($id == $id2) ? "selected" : "";
}

function clean_number($number)
{
    return preg_replace('/[^0-9]/', '', $number);
}

function print_query($builder)
{
    $addSlashes = str_replace('?', "'?'", $builder->toSql());
    return vsprintf(str_replace('?', '%s', $addSlashes), $builder->getBindings());
}

function user_status($status = "", $is_delete_at = false)
{
    if ($is_delete_at) {
        $status = "<span class='badge badge-danger'>Deleted</span>";
    } elseif ($status == "inactive") {
        $status = "<span class='badge badge-warning'>" . ucfirst($status) . "</span>";
    } else {
        $status = "<span class='badge badge-success'>" . ucfirst($status) . "</span>";
    }
    return $status;
}


function is_active_module($names = [])
{
    $current_route = request()->route()->getName();
    return in_array($current_route, $names) ? "kt-menu__item--active kt-menu__item--open" : "";
}

function echo_extra_for_site_setting($extra = "")
{
    $string = "";
    $extra = json_decode($extra);
    if (!empty($extra) && (is_array($extra) || is_object($extra))) {
        foreach ($extra as $key => $item) {
            $string .= $key . '="' . $item . '" ';
        }
    }
    return $string;
}


function pre($data = '', $exit = TRUE)
{
    echo '<pre>';
    print_r($data);
    echo '<pre>';
    if ($exit)
        exit;
}

if (!function_exists('checkFileExist')) {

    /**
     * return path of image
     *
     * @param string $path
     * @return string
     *
     * @throws \RuntimeException
     */
    function checkFileExist($path = '')
    {
        $url = asset($path);
        if (!empty($path))
            $url = asset($path);
        else
            $url = asset('uploads/no_image.png');

        return $url;
    }

}
function get_new_error_html($error)
{
    $content = "";
    if ($error->any() !== null && $error->any()) {
        foreach ($error->all() as $key => $value) {
            $content .= '<div class="alert alert-danger alert-dismissible mb-1" role="alert">';
            $content .= '<div class="alert-text">' . $value . '</div>';
            $content .= '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>';
            $content .= '</div>';
        }

    }
    return $content;
}

function place_currency($amt, $currency = '€', $before = TRUE)
{
    $amt = number_format(round($amt, 2), 2);
    $formated_curr = $currency . ' ' . $amt;
    if ($before == FALSE)
        $formated_curr = $amt . ' ' . $currency;
    return $formated_curr;
}


function getTimeSlot($interval, $start_time, $end_time)
{
    $start = new DateTime($start_time);
    $end = new DateTime($end_time);
    $startTime = $start->format('H:i');
    $endTime = $end->format('H:i');
    $i = 0;
    $time = [];
    while (strtotime($startTime) <= strtotime($endTime)) {
        $start = $startTime;
        $end = date('H:i', strtotime('+' . $interval . ' minutes', strtotime($startTime)));
        $startTime = date('H:i', strtotime('+' . $interval . ' minutes', strtotime($startTime)));

        if (strtotime($startTime) <= strtotime($endTime)) {
            $slot_name = '';
            switch (true) {
                case strtotime($start) < strtotime('12:00:00'):
                    $slot_name = 'morning';
                    break;
                case strtotime($start) >= strtotime('12:00:00') && strtotime($start) < strtotime('16:00:00'):
                    $slot_name = 'afternoon';
                    break;
                case strtotime($start) >= strtotime('16:00:00'):
                    $slot_name = 'evening';
                    break;
            }
            $time[$i]['start_time'] = $start;
            $time[$i]['end_time'] = $end;
            $time[$i]['slot_name'] = $slot_name;
            $i++;
        }
    }
    return $time;
}


function upload_multipe_file($files = "", $path = null, $id = "0")
{
    $file = "";
    $request = \request();
    if ($request->hasFile($files) && $path) {
        $files_list = $request->file($files);
        $path = 'uploads/crowd_sourcing/damge_images/';

        @mkdir($path, 0777);

        foreach ($files_list as $file) {
            $file_name = $file->getClientOriginalName();

            $file->move($path, $file_name);

            $file_name = $path . $file_name;

            $file_names[] = $file_name;
        }

        return $file_names;
    }

    return $file;
}

function sendTextLocalSMS($numbers = [], $message = '',$sender='RMSICN')
{
    try {
// Account details
        $apiKey = urlencode('MzI1ODU0Njg2OTZmNGU0ZTQzNDE3MzQ2NjQ2ODUyNjM=');

        // Message details
        $message = rawurlencode($message);

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        // Process your response here
        // pre($response);
        return ['status' => 200, 'message' => (isset($response->status)) ? $response->status : 'success'];
    } catch (Exception $e) {
        pre($e);
        return ['status' => 412, 'message' => $e->getMessage()];
    }
}
