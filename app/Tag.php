<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use DB;

class Tag extends Model
{
    use Taggable;
    static function load_all_tags($lng){
     return $load_all_popular_tags = DB::select("SELECT  `taggable_taggables`.tag_id, `taggable_tags`.`name` FROM `taggable_taggables`  INNER JOIN  `taggable_tags` ON `taggable_taggables`.`tag_id` =`taggable_tags`.`tag_id`  WHERE  `taggable_taggables`.`lang_id` = $lng GROUP BY `taggable_taggables`.`tag_id`,`taggable_tags`.`name` LIMIT 15");

       }
}
