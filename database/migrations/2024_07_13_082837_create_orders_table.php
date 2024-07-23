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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->datetime('Date');
            $table->string('NameCustomer');
            $table->string('PhoneCustomer', 15); 
            $table->string('Status');
            // Sử dụng kiểu dữ liệu decimal cho giá trị số chính xác nhất
            $table->decimal('TotalPrice', 10, 2); 
            $table->string('NumberTracking')->unique();
            $table->foreignId('IDPaymentMethod')->constrained('payment_methods');
            $table->foreignId('IDCity')->constrained('cities');
            $table->foreignId('IDDistrict')->constrained('districts');
            $table->foreignId('IDWard')->constrained('wards');
            $table->foreignId('IDUser')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
