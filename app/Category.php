<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getImageAttribute($val)
    {
        return checkFileExist($val);
    }

    public function scopeCategoryDetail($query)
    {
        return $query->select(['id', 'name', 'image']);
    }
}
