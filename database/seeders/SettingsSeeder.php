<?php

namespace Database\Seeders;

use App\Helpers\Qs;
use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = new GeneralSetting();
        $data = $setting->defaultData();

        foreach ($data as $key) {
            $setting->create($key);
        }
    }
}
