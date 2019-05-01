<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lang extends Model
{
    static function getLangId($locale) {
        // $lang= App::getLocale();
        return  $lng = DB::table('langs')
        ->where('lng','=',$locale)
        ->value('id');
    }
}
