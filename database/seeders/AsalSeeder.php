<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AsalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kota_asal' => 'Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_asal' => 'Jakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_asal' => 'Yogyakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_asal' => 'Surabaya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_asal' => 'Semarang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_asal' => 'Malang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_asal' => 'Purwokerto',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_asal' => 'Solo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_asal' => 'Cirebon',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        DB::table('asals')->insert($data);
    }
}
