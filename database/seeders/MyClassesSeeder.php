<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MyClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'Pre-Nursery', 'class_type_id' => $ct[0]],
            ['name' => 'Nursery', 'class_type_id' => $ct[1]],
            ['name' => 'LKG', 'class_type_id' => $ct[1]],
            ['name' => 'UKG', 'class_type_id' => $ct[1]],

            ];

        DB::table('my_classes')->insert($data);

    }
}
