<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->foreignId('my_class_id')->nullable()->constrained('my_classes')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->tinyInteger('active')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->unique(['name', 'my_class_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
