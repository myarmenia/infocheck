<?php

use Illuminate\Database\Seeder;
use App\Document;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doc = new Document();
        $doc->name = 'gorcer.doc';
        $doc->link = 'posts/1/gorcer.doc';
        $doc->type = 'doc';
        $doc->documentable_id = 1;
        $doc->documentable_type = 'App\Post';
        $doc->save();

        $doc = new Document();
        $doc->name = 'gorcer.pdf';
        $doc->link = 'posts/6/gorcer.pdf';
        $doc->type = 'pdf';
        $doc->documentable_id = 6;
        $doc->documentable_type = 'App\Post';
        $doc->save();

        $doc = new Document();
        $doc->name = 'gorcer.doc';
        $doc->link = 'posts/6/gorcer.doc';
        $doc->type = 'doc';
        $doc->documentable_id = 6;
        $doc->documentable_type = 'App\Post';
        $doc->save();

    }
}
