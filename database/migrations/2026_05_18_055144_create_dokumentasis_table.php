<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dokumentasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('file_path');
            $table->enum('tipe', ['foto', 'video', 'dokumen'])->default('foto');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('dokumentasis');
    }
};
