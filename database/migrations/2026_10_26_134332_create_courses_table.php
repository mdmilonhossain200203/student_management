<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  id, title, slug, description, price, duration, thumbnail, teacher_id, status,
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->integer('price');
            $table->time('duration');
            $table->unsignedInteger('duration')->default(1);
            $table->string('thumbnail')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->string('status')->nullable();

            

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
