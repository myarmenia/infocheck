<?php

use Illuminate\Database\Seeder;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // #Cat1
        $category = new Category();
        $category->item_id = 1;
        $category->name = 'Հայաստան';
        $category->position = 1;
        $category->layout = 'A';
        $category->lang_id = 1;
        $category->save();

        $category = new Category();
        $category->item_id = 1;
        $category->name = 'Armenia';
        $category->position = 1;
        $category->layout = 'A';
        $category->lang_id = 2;
        $category->save();

        $category = new Category();
        $category->item_id = 1;
        $category->name = 'Армения';
        $category->position = 1;
        $category->layout = 'A';
        $category->lang_id = 3;
        $category->save();

            // #Cat2
            $category = new Category();
            $category->item_id = 2;
            $category->name = 'Միջազգային';
            $category->position = 2;
            $category->layout = 'B';
            $category->lang_id = 1;
            $category->save();

            $category = new Category();
            $category->item_id = 2;
            $category->name = 'International';
            $category->position = 2;
            $category->layout = 'B';
            $category->lang_id = 2;
            $category->save();

            $category = new Category();
            $category->item_id = 2;
            $category->name = 'Международные';
            $category->position = 2;
            $category->layout = 'B';
            $category->lang_id = 3;
            $category->save();

        // #Cat3
        $category = new Category();
        $category->item_id = 3;
        $category->name = 'Տարածաշրջանային';
        $category->position = 3;
        $category->layout = 'C';
        $category->lang_id = 1;
        $category->save();

        $category = new Category();
        $category->item_id = 3;
        $category->name = 'Regional';
        $category->position = 3;
        $category->layout = 'C';
        $category->lang_id = 2;
        $category->save();

        $category = new Category();
        $category->item_id = 3;
        $category->name = 'Региональный';
        $category->position = 3;
        $category->layout = 'C';
        $category->lang_id = 3;
        $category->save();

            // #Cat4
            $category = new Category();
            $category->item_id = 4;
            $category->name = 'Գծային';
            $category->position = 4;
            $category->layout = 'D';
            $category->lang_id = 1;
            $category->save();

            $category = new Category();
            $category->item_id = 4;
            $category->name = 'Linear';
            $category->position = 4;
            $category->layout = 'D';
            $category->lang_id = 2;
            $category->save();

            $category = new Category();
            $category->item_id = 4;
            $category->name = 'Линейный';
            $category->position = 4;
            $category->layout = 'D';
            $category->lang_id = 3;
            $category->save();

        // #Cat5
        $category = new Category();
        $category->item_id = 5;
        $category->name = 'Գարնանային';
        $category->position = 5;
        $category->layout = 'C';
        $category->lang_id = 1;
        $category->save();

        $category = new Category();
        $category->item_id = 5;
        $category->name = 'Spring';
        $category->position = 5;
        $category->layout = 'C';
        $category->lang_id = 2;
        $category->save();

        $category = new Category();
        $category->item_id = 5;
        $category->name = 'Весенний';
        $category->position = 5;
        $category->layout = 'C';
        $category->lang_id = 3;
        $category->save();

            // #Cat6
            $category = new Category();
            $category->item_id = 6;
            $category->name = 'Ամառային';
            $category->position = 6;
            $category->layout = 'A';
            $category->lang_id = 1;
            $category->save();

            $category = new Category();
            $category->item_id = 6;
            $category->name = 'Summer';
            $category->position = 6;
            $category->layout = 'A';
            $category->lang_id = 2;
            $category->save();

            $category = new Category();
            $category->item_id = 6;
            $category->name = 'Летний';
            $category->position = 6;
            $category->layout = 'A';
            $category->lang_id = 3;
            $category->save();

        // #Cat7
        $category = new Category();
        $category->item_id = 7;
        $category->name = 'Աշնանային';
        $category->position = 7;
        $category->layout = 'B';
        $category->lang_id = 1;
        $category->save();

        $category = new Category();
        $category->item_id = 7;
        $category->name = 'Outumn';
        $category->position = 7;
        $category->layout = 'B';
        $category->lang_id = 2;
        $category->save();

        $category = new Category();
        $category->item_id = 7;
        $category->name = 'Осенний';
        $category->position = 7;
        $category->layout = 'B';
        $category->lang_id = 3;
        $category->save();

            // #Cat8
            $category = new Category();
            $category->item_id = 8;
            $category->name = 'Ձմեռային';
            $category->position = 8;
            $category->layout = 'D';
            $category->lang_id = 1;
            $category->save();

            $category = new Category();
            $category->item_id = 8;
            $category->name = 'Winter';
            $category->position = 8;
            $category->layout = 'D';
            $category->lang_id = 2;
            $category->save();

            $category = new Category();
            $category->item_id = 8;
            $category->name = 'Зимний';
            $category->position = 8;
            $category->layout = 'D';
            $category->lang_id = 3;
            $category->save();

    }
}
