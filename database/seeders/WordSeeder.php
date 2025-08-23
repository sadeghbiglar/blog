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
    [
        'word_en' => 'abandon',
        'meaning_fa' => 'رها کردن',
        'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e',
        'stage' => '1'
    ],
    [
        'word_en' => 'keen',
        'meaning_fa' => 'مشتاق',
        'image_url' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1',
        'stage' => '1'
    ],
    [
        'word_en' => 'jealous',
        'meaning_fa' => 'حسود',
        'image_url' => 'https://images.unsplash.com/photo-1485217988980-11786ced9454',
        'stage' => '1'
    ],
    [
        'word_en' => 'tact',
        'meaning_fa' => 'درایت',
        'image_url' => 'https://images.unsplash.com/photo-1516321318423-f06f85e756b6',
        'stage' => '1'
    ],
    [
        'word_en' => 'oath',
        'meaning_fa' => 'سوگند',
        'image_url' => 'https://images.unsplash.com/photo-1589877499431-4f7f6c6b0a7d',
        'stage' => '1'
    ],
    [
        'word_en' => 'vacant',
        'meaning_fa' => 'خالی',
        'image_url' => 'https://images.unsplash.com/photo-1519125323398-675f1b1b6678',
        'stage' => '1'
    ],
    [
        'word_en' => 'hardship',
        'meaning_fa' => 'سختی',
        'image_url' => 'https://images.unsplash.com/photo-1505236858219-8359eb29e85b',
        'stage' => '1'
    ],
    [
        'word_en' => 'gallant',
        'meaning_fa' => 'شجاع',
        'image_url' => 'https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d',
        'stage' => '1'
    ],
    [
        'word_en' => 'data',
        'meaning_fa' => 'داده',
        'image_url' => 'https://images.unsplash.com/photo-1551288049-b1f3c0d0c4f7',
        'stage' => '1'
    ],
    [
        'word_en' => 'unaccustomed',
        'meaning_fa' => 'ناآشنا',
        'image_url' => 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0',
        'stage' => '1'
    ],
    [
        'word_en' => 'bachelor',
        'meaning_fa' => 'مجرد',
        'image_url' => 'https://images.unsplash.com/photo-1506794778202-6d8d610e5b19',
        'stage' => '2'
    ],
    [
        'word_en' => 'qualify',
        'meaning_fa' => 'واجد شرایط بودن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'corpse',
        'meaning_fa' => 'جسد',
        'image_url' => 'https://images.unsplash.com/photo-1579157064687-30f12b8a6b38',
        'stage' => '2'
    ],
    [
        'word_en' => 'conceal',
        'meaning_fa' => 'پنهان کردن',
        'image_url' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba',
        'stage' => '2'
    ],
    [
        'word_en' => 'dismal',
        'meaning_fa' => 'غمگین',
        'image_url' => 'https://images.unsplash.com/photo-1506703715700-156ade6b103b',
        'stage' => '2'
    ],
    [
        'word_en' => 'frigid',
        'meaning_fa' => 'سرد',
        'image_url' => 'https://images.unsplash.com/photo-1487621167305-5d248087c994',
        'stage' => '2'
    ],
    [
        'word_en' => 'inhabit',
        'meaning_fa' => 'ساکن شدن',
        'image_url' => 'https://images.unsplash.com/photo-1518780664697-55e3ad937233',
        'stage' => '2'
    ],
    [
        'word_en' => 'numb',
        'meaning_fa' => 'بی‌حس',
        'image_url' => 'https://images.unsplash.com/photo-1541778767-3603e010266c',
        'stage' => '2'
    ],
    [
        'word_en' => 'peril',
        'meaning_fa' => 'خطر',
        'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e',
        'stage' => '2'
    ],
    [
        'word_en' => 'recline',
        'meaning_fa' => 'لَم دادن',
        'image_url' => 'https://images.unsplash.com/photo-1519125323398-675f1b1b6678',
        'stage' => '2'
    ]

        ];

        foreach ($words as $word) {
            Word::create($word);
        }
    }
}
