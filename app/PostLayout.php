<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLayout extends Model
{
    public $timestamps = false;
    protected $fillable = ['class_name', 'active'];
}
