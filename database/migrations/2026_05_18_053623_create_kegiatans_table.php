<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('thumbnail')->nullable();
            $table->string('lokasi');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai')->nullable();
            $table->enum('status', ['akan_datang', 'berlangsung', 'selesai'])->default('akan_datang');
            $table->enum('kategori', ['Sosial', 'Pendidikan', 'Olahraga', 'Seni Budaya', 'Ekonomi', 'Lainnya'])->default('Lainnya');
            $table->integer('peserta')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
