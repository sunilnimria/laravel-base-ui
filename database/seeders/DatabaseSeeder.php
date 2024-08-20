<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            SettingsSeeder::class,
            BloodGroupsSeeder::class,
            CountriesSeeder::class,
            StatesTableSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            RolePermissionSeeder::class,
            ClassTypeSeeder::class,
            MyClassesSeeder::class,
            SectionsSeeder::class,
            SubjectsSeeder::class
        ]);

        User::factory(5000)->create();
    }
}
