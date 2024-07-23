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
        Schema::create('watches', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->text('Description');
            $table->string('Image');
            $table->string('Engine');
            $table->string('AvoidWater');
            $table->string('SizeStrap');
            $table->string('SizeGlass');
            $table->string('MaterialGlass');
            $table->foreignId('IDManufacturer')->constrained('manufacturers');
            $table->foreignId('IDCategory')->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watches');
    }
};
