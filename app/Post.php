<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class Post extends Model
{
    use Taggable;

    protected $fillable = [
        'unique_id', 'title', 'short_text', 'html_code', 'img', 'date', 'status', 'meta_k', 'meta_d', 'category_id',  'lang_id'
    ];

    public function getCategory() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function getDocuments() {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function getComments() {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function getQuestion() {
        return $this->morphOne('App\Question', 'questionable');
    }





}
