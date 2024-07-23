<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('NameUser');
            $table->string('Password');
            $table->string('PhoneNumber', 15);
            $table->string('Email');
            $table->string('Role');
            $table->foreignId('IDCity')->constrained('cities');
            $table->foreignId('IDDistrict')->constrained('districts');
            $table->foreignId('IDWard')->constrained('wards');
            $table->string('Address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
