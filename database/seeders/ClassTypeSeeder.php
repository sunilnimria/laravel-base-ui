<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Creche', 'code' => 'C'],
            ['name' => 'Pre Primary', 'code' => 'PP'],
            ['name' => 'Primary', 'code' => 'P'],
            ['name' => 'Middle', 'code' => 'M'],
            ['name' => 'Secondary', 'code' => 'S'],
            ['name' => 'Senior Secondary', 'code' => 'SS'],
        ];

        DB::table('class_types')->insert($data);
    }
}
