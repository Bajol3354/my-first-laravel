<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [ // Command Record Data
            ['id' => 1, 'name' => 'Maryanto', 'score' => 80],
            ['id' => 2, 'name' => 'Ahmad', 'score' => 85],
            ['id' => 3, 'name' => 'Budi', 'score' => 90],
        ];

        DB::table('students')->insert($data); // Command where data insert to table in DB (from use Illuminate\Support\Facades\DB;)
    }
}
