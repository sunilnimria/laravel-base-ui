<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->boolean('has_practical')->default(false);
            $table->foreignId('my_class_id')->nullable()->constrained('my_classes')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->unique(['my_class_id', 'name', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
