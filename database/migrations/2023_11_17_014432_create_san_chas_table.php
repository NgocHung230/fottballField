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
        Schema::create('san_chas', function (Blueprint $table) {
            $table->id();
            $table->string('tensan');
            $table->string('diachi');
            $table->string('sdt');
            $table->string('quanly');
            // $table->foreign('quanly')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_chas');
    }
};
