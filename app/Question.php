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

    public function getQuestionable() {
        return $this->morphTo();
    }

}
