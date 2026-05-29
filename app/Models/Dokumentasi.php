<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasis';
    protected $fillable = ['user_id', 'judul', 'deskripsi', 'file_path', 'tipe', 'kategori'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
