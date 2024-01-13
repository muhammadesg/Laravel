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
        Schema::create('accordions', function (Blueprint $table) {
            $table->id();
            $table->string('address_uz');
            $table->string('address_ru');
            $table->string('address_en');
            $table->string('tel');
            $table->string('email');
            $table->string('location_uz');
            $table->string('location_ru');
            $table->string('location_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accordions');
    }
};
