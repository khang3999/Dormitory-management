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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('MSSV');
            $table->string('password');
            $table->string('name');
            $table->string('job');
            $table->string('course');
            $table->string('class');
            $table->string('cccd');
            $table->string('birthday');
            $table->string('phone');
            $table->string('mail');
            $table->string('nation');
            $table->integer('gender');
            $table->string('time');
            $table->string('note')->nullable();
            $table->string('address');
            //type 0 là sinh viên out, 2 là sinh viên đăng kí vào, 1 là sinh viên hiện ở kí túc xá
            $table->integer('type');
            $table->string('idphong')->nullable();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
    
};