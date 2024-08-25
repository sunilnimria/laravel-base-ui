<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // $table->string('srn')->unique();
            $table->string('admission_no')->unique();
            $table->unsignedBigInteger('roll_no')->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->foreignId('my_parent_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('mobile_no');
            $table->string('password');
            $table->enum('gender',['male', 'female', 'other']);
            $table->date('dob');
            $table->date('reg_date');
            $table->foreignId('reg_class')->nullable()->constrained('my_classes')->nullOnDelete()->cascadeOnUpdate();
            $table->date('reg_end_date')->nullable();
            $table->foreignId('my_class_id')->nullable()->constrained('my_classes')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->nullable()->constrained('sections')->nullOnDelete()->cascadeOnUpdate();
            $table->string('house_no');
            $table->string('landmark');
            $table->string('city');
            $table->foreignId('country_id')->nullable()->constrained('countries')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('state_id')->nullable()->constrained('states')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('district_id')->nullable()->constrained('districts')->nullOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('pin_code');
            $table->foreignId('photo')->nullable()->constrained('files')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('blood_group')->nullable()->constrained('blood_groups')->nullOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
