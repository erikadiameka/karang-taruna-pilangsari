<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_berita_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->string('thumbnail')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->integer('views')->default(0);
            $table->boolean('featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('kategori_berita_id')
                ->references('id')
                ->on('kategori_beritas')
                ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
