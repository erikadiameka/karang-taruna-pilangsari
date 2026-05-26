<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = [
        'kategori_berita_id',
        'user_id',
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'thumbnail',
        'status',
        'views',
        'featured',
        'published_at'
    ];
    protected $casts = [
        'published_at' => 'datetime',
        'featured' => 'boolean',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($b) {
            $b->slug = Str::slug($b->judul) . '-' . time();
        });
    }
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id');
    }
    public function penulis()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
    public function scopePublished($q)
    {
        return $q->where('status', 'published');
    }

    public function incrementViews() {
    $this->increment('views');
}
}
