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
        'word_en' => 'Abandon',
        'meaning_fa' => 'ترک کردن ، رها کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Keen',
        'meaning_fa' => 'تیز ، زیرک',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Jealous',
        'meaning_fa' => 'حسود',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Tact',
        'meaning_fa' => 'تدبیر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Oath',
        'meaning_fa' => 'قسم ، سوگند خوردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Vacant',
        'meaning_fa' => 'خالی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Hardship',
        'meaning_fa' => 'بی نوایی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Gallant',
        'meaning_fa' => 'شجاع',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Data',
        'meaning_fa' => 'اطلاعات ، داده ها',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Unaccustomed',
        'meaning_fa' => 'غیرعادی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Bachelor',
        'meaning_fa' => 'مرد مجرد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Qualify',
        'meaning_fa' => 'واجد شرایط شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '1'
    ],
    [
        'word_en' => 'Corpse',
        'meaning_fa' => 'جنازه ، جسد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Conceal',
        'meaning_fa' => 'پنهان کردن ، پوشاندن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Dismal',
        'meaning_fa' => 'غمگین',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Frigid',
        'meaning_fa' => 'خیلی سرد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Inhabit',
        'meaning_fa' => 'ساکن شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Numb',
        'meaning_fa' => 'بی حس',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Peril',
        'meaning_fa' => 'مخاطره ، خطر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Recline',
        'meaning_fa' => 'تکیه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Shriek',
        'meaning_fa' => 'جیغ کشیدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Sinister',
        'meaning_fa' => 'شیطانی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Tempt',
        'meaning_fa' => 'وسوسه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Wager',
        'meaning_fa' => 'شرط بندی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '2'
    ],
    [
        'word_en' => 'Typical',
        'meaning_fa' => 'نمونه ، معمولی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Minimum',
        'meaning_fa' => 'حداقل',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Scarce',
        'meaning_fa' => 'کمیاب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Annual',
        'meaning_fa' => 'سالی یکبار ، سالانه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Persuade',
        'meaning_fa' => 'متقاعد کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Essential',
        'meaning_fa' => 'ضروری',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Blend',
        'meaning_fa' => 'مخلوط کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Visible',
        'meaning_fa' => 'دیدنی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Expensive',
        'meaning_fa' => 'گران',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Talent',
        'meaning_fa' => 'استعداد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Devise',
        'meaning_fa' => 'طراحی کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Wholesale',
        'meaning_fa' => 'عمده فروشی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '3'
    ],
    [
        'word_en' => 'Vapor',
        'meaning_fa' => 'بخار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Eliminate',
        'meaning_fa' => 'حذف کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Villain',
        'meaning_fa' => 'آدم شرور ، مجرم',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Dense',
        'meaning_fa' => 'فشرده ، انبوه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Utilize',
        'meaning_fa' => 'به کار بردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Humid',
        'meaning_fa' => 'مرطوب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Theory',
        'meaning_fa' => 'تئوری ، نظریه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Descend',
        'meaning_fa' => 'فرود آمدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Circulate',
        'meaning_fa' => 'گشتن ، دور زدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Enormous',
        'meaning_fa' => 'عظیم ، بزرگ',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Predict',
        'meaning_fa' => 'پیش بینی کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Vanish',
        'meaning_fa' => 'ناپدید شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '4'
    ],
    [
        'word_en' => 'Tradition',
        'meaning_fa' => 'سنت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Rural',
        'meaning_fa' => 'روستایی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Burden',
        'meaning_fa' => 'مسئولیت سنگین',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Campus',
        'meaning_fa' => 'محوطه دانشگاه یا مدرسه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Majority',
        'meaning_fa' => 'اکثریت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Assemble',
        'meaning_fa' => 'تجمع ، مونتاژ کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Explore',
        'meaning_fa' => 'بررسی کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Topic',
        'meaning_fa' => 'موضوع',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Debate',
        'meaning_fa' => 'بحث',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Evade',
        'meaning_fa' => 'شانه خالی کردن ، فرار کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Probe',
        'meaning_fa' => 'جستجو',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Reform',
        'meaning_fa' => 'اصلاح کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '5'
    ],
    [
        'word_en' => 'Approach',
        'meaning_fa' => 'نزدیک شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Detect',
        'meaning_fa' => 'متوجه شدن ، کشف کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Defect',
        'meaning_fa' => 'نقص',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Employee',
        'meaning_fa' => 'کارمند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Neglect',
        'meaning_fa' => 'غفلت کردن از',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Deceive',
        'meaning_fa' => 'فریب دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Undoubtedly',
        'meaning_fa' => 'بی تردید',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Popular',
        'meaning_fa' => 'عامه پسند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Thorough',
        'meaning_fa' => 'تمام عیار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Client',
        'meaning_fa' => 'موکل ، مشتری',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Comprehensive',
        'meaning_fa' => 'جامع ، مفصل',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Defraud',
        'meaning_fa' => 'پول گرفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '6'
    ],
    [
        'word_en' => 'Postpone',
        'meaning_fa' => 'به تعویق انداختن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Consent',
        'meaning_fa' => 'رضایت دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Massive',
        'meaning_fa' => 'حجیم',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Capsule',
        'meaning_fa' => 'کپسول',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Preserve',
        'meaning_fa' => 'محافظت کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Denounce',
        'meaning_fa' => 'محکوم کردن ، انتقاد کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Unique',
        'meaning_fa' => 'منحصر به فرد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Torrent',
        'meaning_fa' => 'سیلاب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Resent',
        'meaning_fa' => 'رنجیدن از',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Molest',
        'meaning_fa' => 'آسیب رساندن ، حمله کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Gloomy',
        'meaning_fa' => 'تیره تار ، تاریکی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Unforeseen',
        'meaning_fa' => 'غیر مترقبه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '7'
    ],
    [
        'word_en' => 'Exaggerate',
        'meaning_fa' => 'مبالغه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Amateur',
        'meaning_fa' => 'آماتور ، ناشی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Mediocre',
        'meaning_fa' => 'معمولی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Variety',
        'meaning_fa' => 'گوناگونی ، تنوع',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Valid',
        'meaning_fa' => 'معتبر ،‌ قانونی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Survive',
        'meaning_fa' => 'جان سالم به در بردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Weird',
        'meaning_fa' => 'عجیب و غریب ،‌ مرموز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Prominent',
        'meaning_fa' => 'مشهور ، برجسته',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Security',
        'meaning_fa' => 'امنیت ، تضمین',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Bulky',
        'meaning_fa' => 'تنومند ، چاق',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Reluctant',
        'meaning_fa' => 'ناراضی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Obvious',
        'meaning_fa' => 'آشکار ، واضح',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '8'
    ],
    [
        'word_en' => 'Vicinity',
        'meaning_fa' => 'نزدیکی ، محله',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Century',
        'meaning_fa' => 'قرن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Rage',
        'meaning_fa' => 'خشم',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Document',
        'meaning_fa' => 'سند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Conclude',
        'meaning_fa' => 'پایان دادن ، به نتیجه رسیدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Undeniable',
        'meaning_fa' => 'غیر قابل انکار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Resist',
        'meaning_fa' => 'مقاومت کردن در برابر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Lack',
        'meaning_fa' => 'نیاز ، نداشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Ignore',
        'meaning_fa' => 'نادیده گرفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Challenge',
        'meaning_fa' => 'به مبارزه طلبیدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Miniature',
        'meaning_fa' => 'مینیاتور ، ریز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Source',
        'meaning_fa' => 'منشا ، منبع',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '9'
    ],
    [
        'word_en' => 'Excel',
        'meaning_fa' => 'بی نظیر بودن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Feminine',
        'meaning_fa' => 'زنانه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Mount',
        'meaning_fa' => 'سوار شدن ، بالا رفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Compete',
        'meaning_fa' => 'رقابت کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Dread',
        'meaning_fa' => 'هراس ، وحشت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Masculine',
        'meaning_fa' => 'مردانه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Menace',
        'meaning_fa' => 'تهدید ، خطر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Tendency',
        'meaning_fa' => 'تمایل ، گرایش',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Underestimate',
        'meaning_fa' => 'کمتر از حد برآورد کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Victorious',
        'meaning_fa' => 'فاتح ، پیروزمندانه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Numerous',
        'meaning_fa' => 'متعدد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Flexible',
        'meaning_fa' => 'انعطاف پذیر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '10'
    ],
    [
        'word_en' => 'Evidence',
        'meaning_fa' => 'شهادت ، گواه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Solitary',
        'meaning_fa' => 'آدم گوشه گیر ،‌ تنها',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Vision',
        'meaning_fa' => 'دید ، خیال',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Frequent',
        'meaning_fa' => 'مکرر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Glimpse',
        'meaning_fa' => 'نظر اجمالی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Recent',
        'meaning_fa' => 'اخیر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Decade',
        'meaning_fa' => 'دهه ، دوره ده ساله',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Hesitate',
        'meaning_fa' => 'مکث کردن ، اکراه داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Absurd',
        'meaning_fa' => 'پوچ',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Conflict',
        'meaning_fa' => 'اختلاف',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Minority',
        'meaning_fa' => 'اقلیت ، گروه اقلیت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Fiction',
        'meaning_fa' => 'افسانه ، خیال',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '11'
    ],
    [
        'word_en' => 'Ignite',
        'meaning_fa' => 'آتش گرفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Abolish',
        'meaning_fa' => 'لغو کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Urban',
        'meaning_fa' => 'شهری',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Population',
        'meaning_fa' => 'جمعیت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Frank',
        'meaning_fa' => 'رک و راست',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Pollute',
        'meaning_fa' => 'آلوده کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Reveal',
        'meaning_fa' => 'آشکار کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Prohibit',
        'meaning_fa' => 'قدغن کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Urgent',
        'meaning_fa' => 'فوری',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Adequate',
        'meaning_fa' => 'کافی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Decrease',
        'meaning_fa' => 'کاهش دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Audible',
        'meaning_fa' => 'قابل شنیدن ، رسا',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '12'
    ],
    [
        'word_en' => 'Journalist',
        'meaning_fa' => 'روزنامه نگار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Famine',
        'meaning_fa' => 'قحطی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Revive',
        'meaning_fa' => 'نیروی تازه گرفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Commence',
        'meaning_fa' => 'شروع کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Observant',
        'meaning_fa' => 'تیز بین',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Identify',
        'meaning_fa' => 'نشان دادن هویت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Migrate',
        'meaning_fa' => 'مهاجرت کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Vessel',
        'meaning_fa' => 'کشتی ، ظرف ، آوند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Persist',
        'meaning_fa' => 'اصرار کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Hazy',
        'meaning_fa' => 'مه رقیق ، مه آلود',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Gleam',
        'meaning_fa' => 'نور ضعیف',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Editor',
        'meaning_fa' => 'ویراستار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '13'
    ],
    [
        'word_en' => 'Unruly',
        'meaning_fa' => 'عنان گسیخته ، سرکش',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Rival',
        'meaning_fa' => 'رقیب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Violent',
        'meaning_fa' => 'خشن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Brutal',
        'meaning_fa' => 'وحشیانه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Opponent',
        'meaning_fa' => 'حریف ، رقیب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Brawl',
        'meaning_fa' => 'کتک کاری',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Duplicate',
        'meaning_fa' => 'کپی کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Vicious',
        'meaning_fa' => 'وحشی ، وحشیانه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Whirling',
        'meaning_fa' => 'چرخش ، چرخیدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Underdog',
        'meaning_fa' => 'آدم بازنده ، توسری خور',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Thrust',
        'meaning_fa' => 'حمله کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Bewildered',
        'meaning_fa' => 'سردرگم کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '14'
    ],
    [
        'word_en' => 'Expand',
        'meaning_fa' => 'گسترش دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Alter',
        'meaning_fa' => 'اصلاح کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Mature',
        'meaning_fa' => 'بالغ',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Sacred',
        'meaning_fa' => 'مقدس ، مذهبی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Revise',
        'meaning_fa' => 'تجدید نظر کردن ، اصلاح کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Pledge',
        'meaning_fa' => 'تعهد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Casual',
        'meaning_fa' => 'اتفاقی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Pursue',
        'meaning_fa' => 'تعقیب کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Unanimous',
        'meaning_fa' => 'هم عقیده',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Fortunate',
        'meaning_fa' => 'خوش شانس',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Pioneer',
        'meaning_fa' => 'پیشگام',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Innovative',
        'meaning_fa' => 'ابتکاری',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '15'
    ],
    [
        'word_en' => 'Slender',
        'meaning_fa' => 'لاغر ، کم و اندک',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Surpass',
        'meaning_fa' => 'سبقت گرفتن از',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Vast',
        'meaning_fa' => 'وسیع',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Doubt',
        'meaning_fa' => 'تردید کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Capacity',
        'meaning_fa' => 'گنجایش ، ظرفیت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Penetrate',
        'meaning_fa' => 'نفوذ کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Pierce',
        'meaning_fa' => 'سوراخ کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Accurate',
        'meaning_fa' => 'صحیح ، درست',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Microscope',
        'meaning_fa' => 'میکروسکوپ',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Grateful',
        'meaning_fa' => 'سپاسگزار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Cautious',
        'meaning_fa' => 'محتاط',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Confident',
        'meaning_fa' => 'مطمئن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '16'
    ],
    [
        'word_en' => 'Appeal',
        'meaning_fa' => 'علاقه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Addict',
        'meaning_fa' => 'معتاد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Wary',
        'meaning_fa' => 'مراقب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Aware',
        'meaning_fa' => 'آگاه ، دانا',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Misfortune',
        'meaning_fa' => 'بدشانس',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Avoid',
        'meaning_fa' => 'اجتناب کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Wretched',
        'meaning_fa' => 'فلاکت بار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Keg',
        'meaning_fa' => 'بشکه کوچک',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Nourish',
        'meaning_fa' => 'تغذیه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Harsh',
        'meaning_fa' => 'تند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Quantity',
        'meaning_fa' => 'مقدار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Opt',
        'meaning_fa' => 'انتخاب کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '17'
    ],
    [
        'word_en' => 'Tragedy',
        'meaning_fa' => 'تراژدی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Pedestrian',
        'meaning_fa' => 'عابر پیاده',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Glance',
        'meaning_fa' => 'نگاه گذرا ، نگاهی انداختن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Budget',
        'meaning_fa' => 'بودجه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Nimble',
        'meaning_fa' => 'چابک ، فرز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Manipulate',
        'meaning_fa' => 'دستکاری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Reckless',
        'meaning_fa' => 'بی احتیاط',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Horrid',
        'meaning_fa' => 'ترسناک ، مهیب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Rave',
        'meaning_fa' => 'هذیان گفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Economical',
        'meaning_fa' => 'مقرون به صرفه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Lubricate',
        'meaning_fa' => 'روغن کاری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Ingenious',
        'meaning_fa' => 'مبتکر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '18'
    ],
    [
        'word_en' => 'Harvest',
        'meaning_fa' => 'درو کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Abundant',
        'meaning_fa' => 'فراوان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Uneasy',
        'meaning_fa' => 'ناراحت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Calculate',
        'meaning_fa' => 'محاسبه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Absorb',
        'meaning_fa' => 'جذب کردن رطوبت یا آب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Estimate',
        'meaning_fa' => 'محاسبه کردن ، قضاوت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Morsel',
        'meaning_fa' => 'لقمه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Quota',
        'meaning_fa' => 'سهمیه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Threat',
        'meaning_fa' => 'تهدید ، خطر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Ban',
        'meaning_fa' => 'منع کردن ، ممنوع کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Panic',
        'meaning_fa' => 'سراسیمگی ، هول',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Appropriate',
        'meaning_fa' => 'مناسب ، درست',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '19'
    ],
    [
        'word_en' => 'Emerge',
        'meaning_fa' => 'بیرون آمدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Jagged',
        'meaning_fa' => 'دندانه دار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Linger',
        'meaning_fa' => 'باقی ماندن ، طول کشیدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Ambush',
        'meaning_fa' => 'شبیخون زدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Crafty',
        'meaning_fa' => 'ماهر ، حرفه ای',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Defiant',
        'meaning_fa' => 'نافرمان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Vigor',
        'meaning_fa' => 'قدرت ، توان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Perish',
        'meaning_fa' => 'هلاک شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Fragile',
        'meaning_fa' => 'شکستنی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Captive',
        'meaning_fa' => 'اسیر جنگی ، محبوس',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Proper',
        'meaning_fa' => 'رونق گرفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Devour',
        'meaning_fa' => 'بلعیدن ، از چیزی مملو بودن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '20'
    ],
    [
        'word_en' => 'Plea',
        'meaning_fa' => 'تقاضا',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Weary',
        'meaning_fa' => 'خسته',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Collide',
        'meaning_fa' => 'تصادف کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Confirm',
        'meaning_fa' => 'تتایید کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Verify',
        'meaning_fa' => 'درباره ی صحت چیزی تحقیق کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Anticipate',
        'meaning_fa' => 'انتظار داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Dilemma',
        'meaning_fa' => 'دوراهی ، تنگنا',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Detour',
        'meaning_fa' => 'راه انحرافی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Merit',
        'meaning_fa' => 'شایستگی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Transmit',
        'meaning_fa' => 'انتقال دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Relieve',
        'meaning_fa' => 'تسکین دادن درد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Baffle',
        'meaning_fa' => 'سر در گم کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '21'
    ],
    [
        'word_en' => 'Warden',
        'meaning_fa' => 'مسئول ، نگهبان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Acknowledge',
        'meaning_fa' => 'پذیرفتن ، به رسمیت شناختن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Justice',
        'meaning_fa' => 'عدالت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Delinquent',
        'meaning_fa' => 'بزهکار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Reject',
        'meaning_fa' => 'نپذیرفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Deprive',
        'meaning_fa' => 'محروم کردن از',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Spouse',
        'meaning_fa' => 'همسر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Vocation',
        'meaning_fa' => 'حرفه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Unstable',
        'meaning_fa' => 'ناپایدار ، متزلزل',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Homicide',
        'meaning_fa' => 'قتل ، قاتل',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Penalize',
        'meaning_fa' => 'اجحاف کردن ، ظلم کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],
    [
        'word_en' => 'Beneficiary',
        'meaning_fa' => 'ذینفع ،‌ بهره مند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '22'
    ],[
        'word_en' => 'Inhibit',
        'meaning_fa' => 'باز داشتن، جلوگیری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '23'
    ],
    [
        'word_en' => 'Fatal',
        'meaning_fa' => 'کشنده، مهلک',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '23'
    ],
    [
        'word_en' => 'Comment',
        'meaning_fa' => 'اظهار نظر، توضیح',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '23'
    ],
    [
        'word_en' => 'Wander',
        'meaning_fa' => 'پرسه زدن، سرگردان بودن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '23'
    ],
    [
        'word_en' => 'Province',
        'meaning_fa' => 'استان، ایالت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '23'
    ],
    [
        'word_en' => 'Compromise',
        'meaning_fa' => 'سازش کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '23'
    ],
    [
        'word_en' => 'Elderly',
        'meaning_fa' => 'سالخورده، مسن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Voluntary',
        'meaning_fa' => 'داوطلبانه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Offend',
        'meaning_fa' => 'ناراحت کردن، توهین کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Accommodate',
        'meaning_fa' => 'سازگار کردن، جای دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Prosper',
        'meaning_fa' => 'موفق شدن، کامیاب شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Devote',
        'meaning_fa' => 'اختصاص دادن، وقف کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Unsightly',
        'meaning_fa' => 'زشت، ناخوشایند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Contact',
        'meaning_fa' => 'تماس، ارتباط',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Sicken',
        'meaning_fa' => 'بیمار کردن، حال بهم زدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Afflict',
        'meaning_fa' => 'رنج دادن، گرفتار کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Monarch',
        'meaning_fa' => 'پادشاه، سلطان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Outlet',
        'meaning_fa' => 'خروجی، محل فروش',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '24'
    ],
    [
        'word_en' => 'Intoxicate',
        'meaning_fa' => 'مست کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Investigate',
        'meaning_fa' => 'تحقیق کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Inaccurate',
        'meaning_fa' => 'غلط، نادرست',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Disperse',
        'meaning_fa' => 'پخش کردن، پراکنده کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Dismiss',
        'meaning_fa' => 'اخراج کردن، رد کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Rage',
        'meaning_fa' => 'خشم، غضب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Install',
        'meaning_fa' => 'نصب کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Destiny',
        'meaning_fa' => 'سرنوشت، تقدیر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Pawn',
        'meaning_fa' => 'گرو گذاشتن، پیاده (شطرنج)',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Vibrant',
        'meaning_fa' => 'پرجنب و جوش، درخشان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Complex',
        'meaning_fa' => 'پیچیده',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Lad',
        'meaning_fa' => 'پسر جوان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '25'
    ],
    [
        'word_en' => 'Tedious',
        'meaning_fa' => 'خسته کننده',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Foe',
        'meaning_fa' => 'دشمن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Grief',
        'meaning_fa' => 'اندوه، غم',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Mourn',
        'meaning_fa' => 'سوگواری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Cherish',
        'meaning_fa' => 'گرامی داشتن، عزیز داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Detest',
        'meaning_fa' => 'متنفر بودن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Widen',
        'meaning_fa' => 'وسیع کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Predict',
        'meaning_fa' => 'پیش بینی کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Astonish',
        'meaning_fa' => 'شگفت زده کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Legacy',
        'meaning_fa' => 'میراث',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Delegate',
        'meaning_fa' => 'نماینده، واگذار کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Sympathy',
        'meaning_fa' => 'همدردی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '26'
    ],
    [
        'word_en' => 'Arouse',
        'meaning_fa' => 'برانگیختن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Exhibit',
        'meaning_fa' => 'نمایش دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Riddle',
        'meaning_fa' => 'معما',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Rot',
        'meaning_fa' => 'فاسد شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Sanctuary',
        'meaning_fa' => 'پناهگاه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Institution',
        'meaning_fa' => 'موسسه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Trespass',
        'meaning_fa' => 'تجاوز کردن، ورود غیرمجاز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Sustain',
        'meaning_fa' => 'نگهداری کردن، ادامه دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Dense',
        'meaning_fa' => 'متراکم، انبوه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Afford',
        'meaning_fa' => 'استطاعت داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Convert',
        'meaning_fa' => 'تبدیل کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Intrude',
        'meaning_fa' => 'مزاحم شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '27'
    ],
    [
        'word_en' => 'Embrace',
        'meaning_fa' => 'در آغوش گرفتن، پذیرفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Wicked',
        'meaning_fa' => 'شرور، بدجنس',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Provoke',
        'meaning_fa' => 'تحریک کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Conquer',
        'meaning_fa' => 'غلبه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Reject',
        'meaning_fa' => 'رد کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Endure',
        'meaning_fa' => 'تحمل کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Enroll',
        'meaning_fa' => 'ثبت نام کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Allege',
        'meaning_fa' => 'ادعا کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Majestic',
        'meaning_fa' => 'با شکوه، عظیم',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Decline',
        'meaning_fa' => 'کاهش یافتن، رد کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Nurture',
        'meaning_fa' => 'پرورش دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Vital',
        'meaning_fa' => 'حیاتی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '28'
    ],
    [
        'word_en' => 'Perplex',
        'meaning_fa' => 'سردرگم کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Abundant',
        'meaning_fa' => 'فراوان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Rebel',
        'meaning_fa' => 'شورش کردن، یاغی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Adverse',
        'meaning_fa' => 'نامساعد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Slander',
        'meaning_fa' => 'تهمت زدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Superb',
        'meaning_fa' => 'عالی، باشکوه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Suppress',
        'meaning_fa' => 'سرکوب کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Trivial',
        'meaning_fa' => 'بی اهمیت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Agitate',
        'meaning_fa' => 'متشنج کردن، به هم زدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Illuminate',
        'meaning_fa' => 'روشن کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Verify',
        'meaning_fa' => 'تایید کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Alleviate',
        'meaning_fa' => 'تسکین دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '29'
    ],
    [
        'word_en' => 'Astound',
        'meaning_fa' => 'مبهوت کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Compile',
        'meaning_fa' => 'جمع آوری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Grudge',
        'meaning_fa' => 'کینه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Prominent',
        'meaning_fa' => 'برجسته، ممتاز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Upheaval',
        'meaning_fa' => 'آشوب، تحول',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Malice',
        'meaning_fa' => 'بدخواهی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Vogue',
        'meaning_fa' => 'مد، رواج',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Exceed',
        'meaning_fa' => 'بیشتر بودن، فراتر رفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Wither',
        'meaning_fa' => 'پژمرده شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Stagger',
        'meaning_fa' => 'تلو تلو خوردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Genuine',
        'meaning_fa' => 'اصیل، واقعی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Persuade',
        'meaning_fa' => 'متقاعد کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '30'
    ],
    [
        'word_en' => 'Challenge',
        'meaning_fa' => 'چالش، به مبارزه طلبیدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Keen',
        'meaning_fa' => 'تیز، مشتاق',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Despise',
        'meaning_fa' => 'تحقیر کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Bias',
        'meaning_fa' => 'تعصب، سوگیری',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Tragic',
        'meaning_fa' => 'غم انگیز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Sentiment',
        'meaning_fa' => 'احساسات',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Prompt',
        'meaning_fa' => 'فوری، سریع',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Convict',
        'meaning_fa' => 'محکوم کردن، مجرم',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Tremendous',
        'meaning_fa' => 'عظیم، شگفت انگیز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Chaos',
        'meaning_fa' => 'آشوب، هرج و مرج',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Retain',
        'meaning_fa' => 'نگه داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Fabulous',
        'meaning_fa' => 'افسانه‌ای، شگفت‌انگیز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '31'
    ],
    [
        'word_en' => 'Intricate',
        'meaning_fa' => 'پیچیده، بغرنج',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Absurd',
        'meaning_fa' => 'بی‌معنی، پوچ',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Liberal',
        'meaning_fa' => 'آزادمنش، لیبرال',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Transform',
        'meaning_fa' => 'دگرگون کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Adorn',
        'meaning_fa' => 'تزئین کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Radiant',
        'meaning_fa' => 'درخشان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Access',
        'meaning_fa' => 'دسترسی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Concede',
        'meaning_fa' => 'قبول کردن، واگذار کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Acquit',
        'meaning_fa' => 'تبرئه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Temporary',
        'meaning_fa' => 'موقت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Futile',
        'meaning_fa' => 'بیهوده',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Suppress',
        'meaning_fa' => 'سرکوب کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '32'
    ],
    [
        'word_en' => 'Admonish',
        'meaning_fa' => 'نصیحت کردن، هشدار دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Transparent',
        'meaning_fa' => 'شفاف',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Turmoil',
        'meaning_fa' => 'آشوب، بلوا',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Heed',
        'meaning_fa' => 'توجه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Modest',
        'meaning_fa' => 'متواضع، فروتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Displace',
        'meaning_fa' => 'جابجا کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Exhibit',
        'meaning_fa' => 'نمایش دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Vibrant',
        'meaning_fa' => 'پرجنب و جوش',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Distort',
        'meaning_fa' => 'تحریف کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Proclaim',
        'meaning_fa' => 'اعلام کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Manifest',
        'meaning_fa' => 'آشکار کردن، واضح',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],
    [
        'word_en' => 'Prosperous',
        'meaning_fa' => 'موفق، کامیاب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '33'
    ],    [
        'word_en' => 'Acute',
        'meaning_fa' => 'شدید، تیز',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Conceive',
        'meaning_fa' => 'تصور کردن، باردار شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Vain',
        'meaning_fa' => 'بیهوده، خودپسند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Sustain',
        'meaning_fa' => 'نگهداری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Tumult',
        'meaning_fa' => 'غوغا، آشوب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Catastrophe',
        'meaning_fa' => 'فاجعه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Diminish',
        'meaning_fa' => 'کاهش یافتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Profound',
        'meaning_fa' => 'عمیق',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Inspire',
        'meaning_fa' => 'الهام بخشیدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Compel',
        'meaning_fa' => 'مجبور کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Ample',
        'meaning_fa' => 'فراوان، کافی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Deviate',
        'meaning_fa' => 'منحرف شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '34'
    ],
    [
        'word_en' => 'Speculate',
        'meaning_fa' => 'حدس زدن، گمانه‌زنی کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Relinquish',
        'meaning_fa' => 'رها کردن، واگذار کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Elite',
        'meaning_fa' => 'نخبه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Thrive',
        'meaning_fa' => 'رشد کردن، شکوفا شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Humble',
        'meaning_fa' => 'فروتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Abandon',
        'meaning_fa' => 'ترک کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Intrigue',
        'meaning_fa' => 'توطئه، دسیسه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Skeptical',
        'meaning_fa' => 'شکاک',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Versatile',
        'meaning_fa' => 'همه‌کاره، چندمنظوره',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Prohibit',
        'meaning_fa' => 'ممنوع کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Oracle',
        'meaning_fa' => 'غیب‌گو، پیشگو',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Revolt',
        'meaning_fa' => 'شورش، طغیان',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '35'
    ],
    [
        'word_en' => 'Candid',
        'meaning_fa' => 'صریح، بی‌ریا',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Entail',
        'meaning_fa' => 'مستلزم بودن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Abstain',
        'meaning_fa' => 'خودداری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Legitimate',
        'meaning_fa' => 'قانونی، مشروع',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Lenient',
        'meaning_fa' => 'مهربان، آسان‌گیر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Vengeance',
        'meaning_fa' => 'انتقام',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Coerce',
        'meaning_fa' => 'مجبور کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Elite',
        'meaning_fa' => 'نخبه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Refrain',
        'meaning_fa' => 'خودداری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Deter',
        'meaning_fa' => 'بازداشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Flourish',
        'meaning_fa' => 'شکوفا شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Remunerate',
        'meaning_fa' => 'پاداش دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '36'
    ],
    [
        'word_en' => 'Constitute',
        'meaning_fa' => 'تشکیل دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Endeavor',
        'meaning_fa' => 'تلاش کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Prudent',
        'meaning_fa' => 'محتاط، عاقل',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Belligerent',
        'meaning_fa' => 'ستیزه‌جو',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Inquire',
        'meaning_fa' => 'پرس‌وجو کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Oust',
        'meaning_fa' => 'اخراج کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Annex',
        'meaning_fa' => 'ضمیمه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Defy',
        'meaning_fa' => 'سرپیچی کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Compromise',
        'meaning_fa' => 'سازش کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Adverse',
        'meaning_fa' => 'نامساعد',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Retrieve',
        'meaning_fa' => 'بازیافتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Confirm',
        'meaning_fa' => 'تأیید کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '37'
    ],
    [
        'word_en' => 'Grotesque',
        'meaning_fa' => 'عجیب و غریب، مضحک',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Compel',
        'meaning_fa' => 'مجبور کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Vogue',
        'meaning_fa' => 'مد، رواج',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Encounter',
        'meaning_fa' => 'مواجه شدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Exquisite',
        'meaning_fa' => 'نفیس، عالی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Peculiar',
        'meaning_fa' => 'عجیب، خاص',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Resent',
        'meaning_fa' => 'ناراحت شدن، کینه داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Torment',
        'meaning_fa' => 'عذاب دادن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Oath',
        'meaning_fa' => 'قسم، سوگند',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Vacant',
        'meaning_fa' => 'خالی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Gallant',
        'meaning_fa' => 'شجاع، نجیب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Hardship',
        'meaning_fa' => 'سختی، مشقت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '38'
    ],
    [
        'word_en' => 'Profound',
        'meaning_fa' => 'عمیق',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Enlighten',
        'meaning_fa' => 'روشن کردن، آگاه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Endure',
        'meaning_fa' => 'تحمل کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Reluctant',
        'meaning_fa' => 'بی‌میل، اکراه داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Prominent',
        'meaning_fa' => 'برجسته',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Exceed',
        'meaning_fa' => 'فراتر رفتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Candid',
        'meaning_fa' => 'صریح، صادق',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Ascertain',
        'meaning_fa' => 'تعیین کردن، اطمینان یافتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Cautious',
        'meaning_fa' => 'محتاط',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Reinforce',
        'meaning_fa' => 'تقویت کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Defraud',
        'meaning_fa' => 'کلاهبرداری کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Plausible',
        'meaning_fa' => 'معقول، باورپذیر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '39'
    ],
    [
        'word_en' => 'Vast',
        'meaning_fa' => 'وسیع',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Beneficial',
        'meaning_fa' => 'مفید',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Repel',
        'meaning_fa' => 'دفع کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Vivid',
        'meaning_fa' => 'زنده، واضح',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Tedious',
        'meaning_fa' => 'خسته‌کننده',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Jeopardy',
        'meaning_fa' => 'خطر، مخاطره',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Tolerate',
        'meaning_fa' => 'تحمل کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Sympathy',
        'meaning_fa' => 'همدردی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Obscure',
        'meaning_fa' => 'مبهم، گمنام',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Annex',
        'meaning_fa' => 'ضمیمه کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Ethics',
        'meaning_fa' => 'اخلاقیات',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Candid',
        'meaning_fa' => 'صریح، صادق',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '40'
    ],
    [
        'word_en' => 'Vow',
        'meaning_fa' => 'عهد، نذر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Persevere',
        'meaning_fa' => 'پشتکار داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Ponder',
        'meaning_fa' => 'تفکر کردن، اندیشیدن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Endanger',
        'meaning_fa' => 'به خطر انداختن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Defiant',
        'meaning_fa' => 'نافرمان، سرکش',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Vivid',
        'meaning_fa' => 'زنده، واضح',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Vulnerable',
        'meaning_fa' => 'آسیب‌پذیر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Compassion',
        'meaning_fa' => 'دلسوزی، ترحم',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Prosperity',
        'meaning_fa' => 'رفاه، موفقیت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Contempt',
        'meaning_fa' => 'تحقیر، نفرت',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Incite',
        'meaning_fa' => 'تحریک کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Ingenious',
        'meaning_fa' => 'نابغه، مبتکر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '41'
    ],
    [
        'word_en' => 'Vigilant',
        'meaning_fa' => 'هوشیار، مراقب',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Candid',
        'meaning_fa' => 'صریح، صادق',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Speculate',
        'meaning_fa' => 'حدس زدن، گمانه‌زنی',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Abolish',
        'meaning_fa' => 'لغو کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Compulsory',
        'meaning_fa' => 'اجباری',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Reluctant',
        'meaning_fa' => 'بی‌میل، اکراه داشتن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Wary',
        'meaning_fa' => 'محتاط، هوشیار',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Distort',
        'meaning_fa' => 'تحریف کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Superb',
        'meaning_fa' => 'عالی، باشکوه',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Apprehend',
        'meaning_fa' => 'دستگیر کردن، درک کردن',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Esteem',
        'meaning_fa' => 'احترام، ارزش',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ],
    [
        'word_en' => 'Feasible',
        'meaning_fa' => 'امکان‌پذیر',
        'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
        'stage' => '42'
    ]
        ];

        foreach ($words as $word) {
            Word::create($word);
        }
    }
}
