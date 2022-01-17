<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
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
                'name' => 'Ruslan Ramdani',
                'Alamat' => 'Kp.Moal Beja Beja AH',
                'telpon' => 6289527340011,
                'email' => 'ruslanramdani1st@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('qweasdzxc123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Penumpang Pertama',
                'Alamat' => 'Kp.Moal Beja Beja Kepo',
                'telpon' => 6289912837187,
                'email' => 'penumpang1@gmail.com',
                'role' => 'penumpang',
                'password' => bcrypt('penumpang1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Penumpang Kedua',
                'Alamat' => 'Kp.Moal Beja Beja',
                'telpon' => 62891283718231,
                'email' => 'penumpang2@gmail.com',
                'role' => 'penumpang',
                'password' => bcrypt('penumpang1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Penumpang Ketiga',
                'Alamat' => 'Kp.Moal Dibejaan',
                'telpon' => 62812093823712,
                'email' => 'penumpang3@gmail.com',
                'role' => 'penumpang',
                'password' => bcrypt('penumpang1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Penumpang Keempat',
                'Alamat' => 'Kp.Kepo AH',
                'telpon' => 62812938129323,
                'email' => 'penumpang4@gmail.com',
                'role' => 'penumpang',
                'password' => bcrypt('penumpang1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('users')->insert($data);
    }
}
