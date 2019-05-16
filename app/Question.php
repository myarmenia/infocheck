<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'body', 'visible', 'link', 'questionable_id', 'questionable_type', 'lang_id', 'user_id'
    ];

    public function getDocuments() {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function questionable() {
        return $this->morphTo();
    }

    public function lang() {
        return $this->belongsTo('App\Lang');
    }

    public function question() {
        return $this->belongsTo('App\Answer', 'questionable_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function post() {
        return $this->belongsTo('App\Post', 'questionable_id', 'id');
    }
}
