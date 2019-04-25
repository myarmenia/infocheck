<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    public $timestamps = false;
    protected $fillable = ['layout', 'status'];
}
