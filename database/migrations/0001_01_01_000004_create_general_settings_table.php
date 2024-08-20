<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('option_name');
            $table->string('option_value');
            $table->timestamps();
        });

        
        // DB::table('general_settings')->insert([
        //     'site_logo'=>'logo.png',
        //     'site_name'=>'News Blog',
        //     'copyright'=>'Copyright © 2023',
        //     'theme_color'=>'#0069D9',
        //     'description'=>'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.',
        //     'email'=>'admin@gmail.com',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
