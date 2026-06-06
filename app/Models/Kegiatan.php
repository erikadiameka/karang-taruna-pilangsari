<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kegiatan extends Model
{
    protected $table = 'kegiatans';
    protected $routeKeyName = 'id';
    protected $fillable = [
        'user_id',
        'nama',
        'slug',
        'deskripsi',
        'thumbnail',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'kategori',
        'peserta'
    ];
    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($k) {
            $k->slug = Str::slug($k->nama) . '-' . time();
        });
    }
    public function pembuat()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'kegiatan_id');
    }
}
