<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->foreignId('class_type_id')->nullable()->constrained('class_types')->nullOnDelete()->cascadeOnUpdate();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('my_classes', function (Blueprint $table) {
            $table->unique(['class_type_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_classes');
    }
}
