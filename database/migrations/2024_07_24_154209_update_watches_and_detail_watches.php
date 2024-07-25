<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWatchesAndDetailWatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Xóa cột 'Image' từ bảng 'watches'
        Schema::table('watches', function (Blueprint $table) {
            if (Schema::hasColumn('watches', 'Image')) {
                $table->dropColumn('Image');
            }
        });

        // Thêm cột 'Image' vào bảng 'detail_watches'
        Schema::table('detail_watches', function (Blueprint $table) {
            if (!Schema::hasColumn('detail_watches', 'Image')) {
                $table->string('Image'); // Cột 'Image' bắt buộc
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Thêm lại cột 'Image' vào bảng 'watches'
        Schema::table('watches', function (Blueprint $table) {
            if (!Schema::hasColumn('watches', 'Image')) {
                $table->string('Image'); // Cột 'Image' bắt buộc
            }
        });

        // Xóa cột 'Image' từ bảng 'detail_watches'
        Schema::table('detail_watches', function (Blueprint $table) {
            if (Schema::hasColumn('detail_watches', 'Image')) {
                $table->dropColumn('Image');
            }
        });
    }
}


