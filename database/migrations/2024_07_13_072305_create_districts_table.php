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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('NameDistrict');

            // Thiết lập khóa ngoại
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });

        // Đường dẫn tới tệp SQL
        $path = database_path('sql/districts.sql');

        // Đọc và thực thi tệp SQL
        if (File::exists($path)) {
            $sql = File::get($path);
            DB::unprepared($sql);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};