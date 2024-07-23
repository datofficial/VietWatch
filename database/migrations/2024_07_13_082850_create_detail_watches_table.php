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
        Schema::create('detail_watches', function (Blueprint $table) {
            $table->id();
            $table->decimal('Price', 10, 2);
            $table->foreignId('IDWatch')->constrained('watches');
            $table->foreignId('IDMaterialStrap')->constrained('material_straps');
            $table->foreignId('IDColor')->constrained('colors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_watches');
    }
};
