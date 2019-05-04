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


       static function get_intersect_status($post_id,$type,$load_popular_tag){
        if ($type == 'Post')
        {
         $tags = Post::find($post_id)->tagArray;
         $post_idies=[];
         for ($i=0; $i < count($load_popular_tag) ; $i++) {
               $id=$load_popular_tag[$i]->id;
               $current_tags = Post::find($id)->tagArray;
               $hatym = array_intersect($tags,$current_tags);
               if(count($hatym)>=3){
                 array_push($post_idies,$id);
               }
           }

           $posts=array("posts"=>$post_idies, "tags"=>$tags);
        return $posts;
          }



}
       static function the_same_posts($post_id,$type,$db,$lng)
          {
             $post=[];
             $load_popular_tag = DB::select("SELECT id FROM $db WHERE id !=$post_id and status !='not_published' and lang_id=$lng ");

             $posts = Tag:: get_intersect_status($post_id,$type,$load_popular_tag);
          //return $posts;
              if(count($posts['posts'])>0)
              {
                $not_in = implode(",", $posts['posts']);
                $row = DB::select("SELECT * from `posts` WHERE `id` IN ($not_in)");
                $posts=array("posts"=>$row);
               }
              return  $posts;
          }
}
