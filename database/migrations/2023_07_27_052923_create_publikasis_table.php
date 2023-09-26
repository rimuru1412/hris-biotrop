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
        Schema::create('publikasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenispublikasi_id');
            $table->string('judul')->nullable();
            $table->string('kegiatan')->nullable();
            $table->integer('tahun')->nullable();
            $table->text('link')->nullable();
            $table->string('pdf')->nullable();
            $table->foreignId('identifier_id')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasis');
    }
};
