<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Ptypes = [
            'چوبی',
            'لیوانی',
            'حصیری',
            'لیتری',
            'فله ای',
        ];
    }
}