<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kegiatan_id')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('file_path');
            $table->enum('tipe', ['foto', 'video'])->default('foto');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();

            $table->foreign('kegiatan_id')
                ->references('id')
                ->on('kegiatans')
                ->onDelete('set null');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
