<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Chỉ tạo bảng 'wards' khi chưa tồn tại
        if (!Schema::hasTable('wards')) {
            Schema::create('wards', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('district_id');
                $table->string('NameWard');

                // Thiết lập khóa ngoại
                $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            });

            // Đường dẫn tới tệp SQL
            $path = database_path('sql/wards.sql');

            // Đọc và thực thi tệp SQL
            if (File::exists($path)) {
                $sql = File::get($path);
                DB::unprepared($sql);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wards');
    }
};