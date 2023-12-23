<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];

    public function from_user()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id')->select(['id', 'name', 'username', 'profile_image']);
    }

}
