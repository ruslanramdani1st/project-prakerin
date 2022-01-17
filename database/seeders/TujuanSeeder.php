<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class TujuanSeeder extends Seeder
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
                'kota_tujuan' => 'Jakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_tujuan' => 'Yogyakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_tujuan' => 'Surabaya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_tujuan' => 'Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_tujuan' => 'Malang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_tujuan' => 'Purwokerto',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_tujuan' => 'Semarang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_tujuan' => 'Cirebon',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'kota_tujuan' => 'Solo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        DB::table('tujuans')->insert($data);
    }
}
