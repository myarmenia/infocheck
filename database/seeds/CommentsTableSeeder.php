<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 3 comments for hayeren
        $comment = new Comment();
        $comment->body = 'Վայ էս ինչ լավ փոստա #1 - post-id#1';
        $comment->approved = 1;
        $comment->post_id = 1;
        $comment->user_id = 3;
        $comment->lang_id = 1;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'Վայ շատ լավ փոստա #2 - post-id#1';
        $comment->approved = 1;
        $comment->post_id = 1;
        $comment->user_id = 3;
        $comment->lang_id = 1;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'Սա ընտիր փոստա #3 - post-id#1';
        $comment->approved = 1;
        $comment->post_id = 1;
        $comment->user_id = 3;
        $comment->lang_id = 1;
        $comment->save();


        // 3 comments for angleren
        $comment = new Comment();
        $comment->body = 'Really cool post #1 - post-id#2';
        $comment->approved = 1;
        $comment->post_id = 2;
        $comment->user_id = 3;
        $comment->lang_id = 2;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'Wery nice post #2 - post-id#2';
        $comment->approved = 1;
        $comment->post_id = 2;
        $comment->user_id = 3;
        $comment->lang_id = 2;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'I will never forget this post #3 - post-id#2';
        $comment->approved = 1;
        $comment->post_id = 2;
        $comment->user_id = 3;
        $comment->lang_id = 2;
        $comment->save();


        // 3 comments for reuseren
        $comment = new Comment();
        $comment->body = 'Отлисная статья спасибо #1 - post-id#3';
        $comment->approved = 1;
        $comment->post_id = 3;
        $comment->user_id = 3;
        $comment->lang_id = 3;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'Это лучшее что может произойти с человеком #2 - post-id#3';
        $comment->approved = 1;
        $comment->post_id = 3;
        $comment->user_id = 3;
        $comment->lang_id = 3;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'Я не забуду этот пост никогда, спасибо #3 - post-id#3';
        $comment->approved = 1;
        $comment->post_id = 3;
        $comment->user_id = 3;
        $comment->lang_id = 3;
        $comment->save();

    }
}
