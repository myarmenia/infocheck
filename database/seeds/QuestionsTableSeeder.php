<?php

use Illuminate\Database\Seeder;
use App\Question;


class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new Question();
        $question->body = 'Խնդրում եմ ասեք, Ճիշտ է՞, որ Մր․ Բինը հայա';
        $question->visible = 0;
        $question->lang_id = 1;
        $question->user_id = 3;
        $question->save();

        $question = new Question();
        $question->body = 'Խնդրում եմ ասեք, Ճիշտ է՞, որ Մր․ Դարտանյանը հայա';
        $question->visible = 0;
        $question->lang_id = 1;
        $question->user_id = 3;
        $question->save();
    }
}
