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
        Schema::create('dat_sans', function (Blueprint $table) {
            $table->id();
            $table->string('idsanbong');
            $table->string('iduser');
            $table->string('idsancha');
            $table->string('ngay');
            $table->integer('khunggio');
            $table->integer('giatien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_sans');
    }
};
