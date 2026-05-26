<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            // First, clear old data or update to NULL
            DB::table('anggota')->update(['divisi' => null]);
            
            // Change divisi enum from old values to new ones
            $table->enum('divisi', [
                'Humas dan Keamanan',
                'Seni Kreatif dan Medafor',
                'Keagamaan',
                'Kepemudaan dan Olahraga'
            ])->nullable()->change();
            
            // Add new columns for leadership structure
            $table->string('posisi_inti')->nullable()->after('divisi');
            $table->integer('urutan_struktur')->nullable()->after('posisi_inti');
        });
    }

    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            // Revert to old divisi enum values
            $table->enum('divisi', [
                'Humas',
                'Sosial',
                'Ekonomi',
                'Seni Budaya',
                'Olahraga',
                'Pendidikan'
            ])->nullable()->change();
            
            // Drop new columns
            $table->dropColumn(['posisi_inti', 'urutan_struktur']);
        });
    }
};

