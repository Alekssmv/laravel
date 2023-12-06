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

        Schema::table('cars', function (Blueprint $table) {
            $table->string('kpp')->nullable()->change();
            $table->date('year')->nullable()->change();
            $table->string('color')->nullable()->change();
            $table->boolean('is_new')->nullable()->change();
            $table->bigInteger('body_id')->unsigned()->nullable()->change();
            $table->bigInteger('engine_id')->unsigned()->nullable()->change();
            $table->bigInteger('class_id')->unsigned()->nullable()->change();
            $table->bigInteger('image_id')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
};
