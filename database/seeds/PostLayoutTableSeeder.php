<?php

use Illuminate\Database\Seeder;
use App\PostLayout;

class PostLayoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postLayout = new PostLayout();
        $postLayout->class_name = 'A';
        $postLayout->save();

        $postLayout = new PostLayout();
        $postLayout->class_name = 'B';
        $postLayout->save();

        $postLayout = new PostLayout();
        $postLayout->class_name = 'C';
        $postLayout->save();

        $postLayout = new PostLayout();
        $postLayout->class_name = 'D';
        $postLayout->save();
    }
}
