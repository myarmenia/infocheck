<?php

use Illuminate\Database\Seeder;
use App\Poster;

class PostersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poster = new Poster();
        $poster->layout = 'four';
        $poster->status = 1;
        $poster->save();

        $poster = new Poster();
        $poster->layout = 'five';
        $poster->status = 0;
        $poster->save();
    }
}
