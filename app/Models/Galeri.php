<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';
    protected $fillable = [
        'kegiatan_id',
        'user_id',
        'judul',
        'deskripsi',
        'file_path',
        'tipe',
        'is_featured'
    ];
    protected $casts = [
        'is_featured' => 'boolean',
    ];
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
    public function uploader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
