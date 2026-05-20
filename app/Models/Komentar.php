<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';
    protected $fillable = [
        'berita_id',
        'user_id',
        'nama',
        'email',
        'isi',
        'approved'
    ];
    protected $casts = ['approved' => 'boolean'];
    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
