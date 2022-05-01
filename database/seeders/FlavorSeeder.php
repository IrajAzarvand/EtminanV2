<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlavorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flavors = [
            1 => [
                'FA' => 'پرتقالی',
                'EN' => 'orange',
                'RU' => 'апельсин',
                'AR' => 'البرتقالي',
            ],
            2 => [
                'FA' => 'آلبالو',
                'EN' => 'Cherries',
                'RU' => 'Вишня',
                'AR' => 'الكرز',
            ],
            3 => [
                'FA' => 'انار',
                'EN' => 'pomegranates',
                'RU' => 'Гранат',
                'AR' => 'رمان',
            ],
            4 => [
                'FA' => 'کولا',
                'EN' => 'Cola',
                'RU' => 'Кола',
                'AR' => 'الكولا',
            ],
            5 => [
                'FA' => 'لیمو',
                'EN' => 'Lemon',
                'RU' => 'Лимон',
                'AR' => 'ليمون',
            ],
            6 => [
                'FA' => 'پرتقالی، آلبالویی',
                'EN' => 'Orange, cherry',
                'RU' => 'Апельсин, вишня',
                'AR' => 'البرتقال والكرز',
            ],
            7 => [
                'FA' => 'وانیلی',
                'EN' => 'Vanilla',
                'RU' => 'Ваниль',
                'AR' => 'فانيلا',
            ],
            8 => [
                'FA' => 'میوه ای',
                'EN' => 'Fruity',
                'RU' => 'Фруктовый',
                'AR' => 'فاكهي',
            ],
            9 => [
                'FA' => 'آناناس',
                'EN' => 'Pineapple',
                'RU' => 'Ананас',
                'AR' => 'أناناس',
            ],
            10 => [
                'FA' => 'وانیل، زغفران',
                'EN' => 'Vanilla, saffron',
                'RU' => 'Ваниль, шафран',
                'AR' => 'الفانيليا والزعفران',
            ],
            11 => [
                'FA' => 'کاکائو',
                'EN' => 'Cocoa',
                'RU' => 'Какао',
                'AR' => 'كاكاو',
            ],
            12 => [
                'FA' => 'موزی',
                'EN' => 'Banana',
                'RU' => 'Банан',
                'AR' => 'موز',
            ],
            13 => [
                'FA' => 'توت فرنگی',
                'EN' => 'Strawberry',
                'RU' => 'клубника',
                'AR' => 'الفراولة',
            ],
            14 => [
                'FA' => 'انبه',
                'EN' => 'Mango',
                'RU' => 'манго',
                'AR' => 'مانجو',
            ],
            15 => [
                'FA' => 'هویج، زعفران',
                'EN' => 'Carrots, saffron',
                'RU' => 'Морковь, шафран',
                'AR' => 'جزر ، زعفران',
            ],
            16 => [
                'FA' => 'بلوبری',
                'EN' => 'blueberry',
                'RU' => 'Черника',
                'AR' => 'توت',
            ],
            17 => [
                'FA' => 'نسکافه',
                'EN' => 'nescafe',
                'RU' => 'нескафе',
                'AR' => 'نسكافيه',
            ],
            18 => [
                'FA' => 'هلو',
                'EN' => 'Peach',
                'RU' => 'Персик',
                'AR' => 'خوخ',
            ],
            19 => [
                'FA' => 'سیب ترش',
                'EN' => 'sour apple',
                'RU' => 'кислое яблоко',
                'AR' => 'حامض التفاح',
            ],
            20 => [
                'FA' => 'طالبی',
                'EN' => 'cantaloupe',
                'RU' => 'мускусная дыня',
                'AR' => 'الشمام',
            ],
            21 => [
                'FA' => 'زعفران',
                'EN' => 'Saffron',
                'RU' => 'Шафран',
                'AR' => 'زعفران',
            ],
            22 => [
                'FA' => 'آدامسی',
                'EN' => 'Chewing gum',
                'RU' => 'Жевательная резинка',
                'AR' => 'علكة',
            ],
            23 => [
                'FA' => 'وانیل، کاکائو',
                'EN' => 'Vanilla, cocoa',
                'RU' => 'Ваниль, какао',
                'AR' => 'الفانيليا والكاكاو',
            ],
            24 => [
                'FA' => 'گردویی',
                'EN' => 'Walnut',
                'RU' => 'грецкий орех',
                'AR' => 'جوز',
            ],
            25 => [
                'FA' => 'بادام',
                'EN' => 'Almond',
                'RU' => 'Миндаль',
                'AR' => 'لوز',
            ],
            26 => [
                'FA' => 'زعفران، پسته',
                'EN' => 'Saffron, pistachio',
                'RU' => 'Шафран, фисташка',
                'AR' => 'زعفران ، فستق',
            ],
            27 => [
                'FA' => 'شیر کامل',
                'EN' => 'Whole milk',
                'RU' => 'цельное молоко',
                'AR' => 'حليب صافي',
            ],
        ];

        foreach ($flavors as $key => $flavor) {
            DB::table('flavors')->insert([
                'id' => $key,
            ]);
            foreach ($flavor as $locale => $value) {

                DB::table('locale_contents')->insert([
                    'page' => 'flavors',
                    'section' => 'flavors',
                    'element_id' => $key,
                    'locale' => $locale,
                    'element_title' => 'flavors',
                    'element_content' => $value,

                ]);
            }
        }
    }
}