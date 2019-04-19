<?php

use Illuminate\Database\Seeder;
use App\Lang;

class LangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lang = new Lang();
        $lang->lng = 'am';
        $lang->lng_name = 'Armenian';
        $lang->save();

        $lang = new Lang();
        $lang->lng = 'en';
        $lang->lng_name = 'English';
        $lang->save();

        $lang = new Lang();
        $lang->lng = 'ru';
        $lang->lng_name = 'Russian';
        $lang->save();
    }
}
