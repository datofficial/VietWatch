<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityToDetailWatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_watches', function (Blueprint $table) {
            $table->integer('Quantity')->default(0); // Thêm cột Quantity với giá trị mặc định là 0
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_watches', function (Blueprint $table) {
            $table->dropColumn('Quantity'); // Xóa cột Quantity
        });
    }
}
