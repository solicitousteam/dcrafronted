<?php

return [
    'empty_object' => new stdClass(),
    'google_map_key' => 'AIzaSyBRR40Ie35qkoC1F5-v3YsZ1eWt51F3Qqg',
    'asset_url' => env('APP_URL'),
    'upload_type' => 'local',
    'default' => [
        'image' => 'uploads/user/user.png',
        'user_image' => 'uploads/user/user.png',
    ],
    'upload_paths' => [
        'exception_upload' => 'uploads/exception',
        'user_profile_image' => 'uploads/user',
        'admin_upload' => 'uploads/admin',
        'banner_images' => 'uploads/banner',
    ],
    'push_log' => true,
    'firebase_server_key' => 'AAAA8WeWqPU:APA91bGJTNLKuNLXjWaiUNwhDPbPG1eafMMbkA6Lk7Eb-7bzUkxzDRWZfpTH70-N7mgBFK-vaWPK8wWff-oeBoZxqr_g6hwroelsA2bdwXYUcTNvCdR0O8HI4jRr6bJ8RAMHc7w0OUfw',
];
