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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('body_text');
            $table->integer('price');

            $table->integer('old_price')->nullable();
            $table->string('salon')->nullable();
            $table->string('kpp')->nullable();
            $table->year('year')->nullable();
            $table->string('color')->nullable();
            $table->boolean('is_new')->default(false);

            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('engine_id')->nullable()->references('id')->on('car_engines');
            $table->foreignId('body_id')->nullable()->references('id')->on('car_bodies');
            $table->foreignId('class_id')->nullable()->references('id')->on('car_classes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('cars');
    }
};
