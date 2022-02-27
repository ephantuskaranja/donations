<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
            [
                [
                    'name' => '1',
                    'email' => 'dev.ephantus@gmail.com',
                    'phonenumber' => '254701234567',
                    'schedule_type' => 'monthly'
                ]
            ];

        DB::table('donors')->insert($data);
    }
}
