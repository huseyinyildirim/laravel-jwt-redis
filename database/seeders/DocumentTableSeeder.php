<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document = Document::create([
            'title' => 'A Dökümanı',
            'content' => 'A dökümanı detayıdır.'
        ]);

        $document = Document::create([
            'title' => 'B Dökümanı',
            'content' => 'B dökümanı detayıdır.'
        ]);

        $document = Document::create([
            'title' => 'C Dökümanı',
            'content' => 'C dökümanı detayıdır.'
        ]);

        $document = Document::create([
            'title' => 'D Dökümanı',
            'content' => 'D dökümanı detayıdır.'
        ]);

        $document = Document::create([
            'title' => 'E Dökümanı',
            'content' => 'E dökümanı detayıdır.'
        ]);
    }
}
