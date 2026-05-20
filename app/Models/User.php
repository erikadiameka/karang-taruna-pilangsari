<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'avatar', 'is_active'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }
    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'super_admin']);
    }
    public function isAnggota(): bool
    {
        return $this->role === 'anggota';
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
