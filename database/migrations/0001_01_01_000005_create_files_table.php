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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('path');
            $table->string('disk')->default('public');
            $table->unique(['slug', 'path', 'disk']);
            // 'email' => Rule::unique('users')->where(function ($query) use ($request) {
            //     return $query->where('name', $request->name);
            // }),
            $table->string('ext');
            $table->unsignedBigInteger('size');
            $table->string('alt')->nullable();
            $table->string('caption')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('uploaded_by');
            $table->boolean('status')->default(true);

            $table->foreign('uploaded_by')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
