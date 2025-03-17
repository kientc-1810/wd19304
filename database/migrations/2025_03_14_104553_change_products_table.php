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
        Schema::table('products', function (Blueprint $table) {
            // chỉnh kiểu dữ liệu cột giá
            $table->unsignedInteger('price')->change();
            //chèn cột
            $table->text('description')->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // trả dữ liệu price về ban đầu
            $table->integer('price')->change();
            // xóa cột
            $table->dropColumn('description');
        });
    }
};
