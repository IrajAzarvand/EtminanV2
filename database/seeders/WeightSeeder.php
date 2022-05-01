<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weights = [
            '60',
            '45',
            '55',
            '70',
            '50',
            '80',
            '90',
            '100',
            '120',
            '350',
            '450',
            '500',
            '600',
        ];

        foreach ($weights as $weight) {

            DB::table('weights')->insert([
                'weight' => $weight,
            ]);
        }
    }
}