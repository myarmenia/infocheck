<?php

use Illuminate\Database\Seeder;
use App\Answer;
use App\Question;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new Answer();
        $answer->body = 'Ոչ, Մր․ Բինը, էն որ ասում են, մաքրամաքուր բրիտանացի է։';
        $answer->save();

        $question = Question::find(1);
        $question->visible = 1;
        $question->questionable_id = $answer->id;
        $question->questionable_type = Answer::class;
        $question->save();
    }
}
