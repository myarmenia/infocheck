<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'body'
    ];
    public function getQuestion() {
        return $this->morphOne('App\Question', 'questionable');
    }

    public function answer() {
        return $this->hasOne('App\Question', 'questionable_id', 'id');
    }

}
