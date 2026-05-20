<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nik',
        'no_hp',
        'foto',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'jabatan',
        'divisi',
        'tahun_masuk',
        'status'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
