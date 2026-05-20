<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nama_lengkap');
            $table->string('nik', 16)->unique();
            $table->string('no_hp', 15)->nullable();
            $table->string('foto')->nullable();
            $table->text('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->string('jabatan')->nullable();
            $table->enum('divisi', ['Humas', 'Sosial', 'Ekonomi', 'Seni Budaya', 'Olahraga', 'Pendidikan'])->nullable();
            $table->year('tahun_masuk')->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif', 'alumni'])->default('aktif');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
