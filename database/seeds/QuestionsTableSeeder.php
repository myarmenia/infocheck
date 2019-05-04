<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\Document;


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

        $doc = new Document();
        $doc->name = 'example.docx';
        $doc->link = '/storage/questions/'.$question->id.'/example.docx';
        $doc->type = 'docx';
        $doc->documentable_id = $question->id;
        $doc->documentable_type = Question::class;
        $doc->save();

        $doc = new Document();
        $doc->name = 'test.pdf';
        $doc->link = '/storage/questions/'.$question->id.'/test.pdf';
        $doc->type = 'pdf';
        $doc->documentable_id = $question->id;
        $doc->documentable_type = Question::class;
        $doc->save();

        $question = new Question();
        $question->body = 'Ո՞րն է ապարանցու սիրած գույնը';
        $question->visible = 0;
        $question->lang_id = 1;
        $question->user_id = 3;
        $question->save();
    }
}
