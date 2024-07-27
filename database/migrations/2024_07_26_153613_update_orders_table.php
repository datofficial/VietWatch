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
        Schema::table('orders', function (Blueprint $table) {
            // Xóa cột Date
            $table->dropColumn('Date');
            
            // Thêm cột Address
            $table->string('Address');

            // Sửa cột NumberTracking thành nullable
            $table->string('NumberTracking')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Thêm lại cột Date
            $table->datetime('Date');
            
            // Xóa cột Address
            $table->dropColumn('Address');

            // Sửa cột NumberTracking thành không nullable
            $table->string('NumberTracking')->unique()->change();
        });
    }
};
