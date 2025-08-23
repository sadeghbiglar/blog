<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = [
            ['word_en' => 'abandon', 'meaning_fa' => 'رها کردن', 'image_url' => 'https://source.unsplash.com/400x300/?abandon'],
            ['word_en' => 'keen', 'meaning_fa' => 'مشتاق', 'image_url' => 'https://source.unsplash.com/400x300/?keen'],
            ['word_en' => 'jealous', 'meaning_fa' => 'حسود', 'image_url' => 'https://source.unsplash.com/400x300/?jealous'],
            ['word_en' => 'tact', 'meaning_fa' => 'کیاست، تدبیر', 'image_url' => 'https://source.unsplash.com/400x300/?tact'],
            ['word_en' => 'oath', 'meaning_fa' => 'قسم', 'image_url' => 'https://source.unsplash.com/400x300/?oath'],
            ['word_en' => 'vacant', 'meaning_fa' => 'خالی', 'image_url' => 'https://source.unsplash.com/400x300/?vacant'],
            ['word_en' => 'hardship', 'meaning_fa' => 'سختی', 'image_url' => 'https://source.unsplash.com/400x300/?hardship'],
            ['word_en' => 'gallant', 'meaning_fa' => 'شجاع، دلیر', 'image_url' => 'https://source.unsplash.com/400x300/?gallant'],
            ['word_en' => 'data', 'meaning_fa' => 'اطلاعات', 'image_url' => 'https://source.unsplash.com/400x300/?data'],
            ['word_en' => 'unaccustomed', 'meaning_fa' => 'غیرعادی، ناآشنا', 'image_url' => 'https://source.unsplash.com/400x300/?unusual'],
         
        ];

        foreach ($words as $word) {
            Word::create($word);
        }
    }
}
