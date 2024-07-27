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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('idphong');
            $table->string('status');
            $table->string('ngayhu');
            $table->string('ngaysua')->nullable();
            $table->string('type');
            $table->timestamps(); // Thêm timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history'); // Đảm bảo bảng được xóa
    }
};
