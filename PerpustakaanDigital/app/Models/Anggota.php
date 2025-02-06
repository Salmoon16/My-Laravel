<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    /** @use HasFactory<\Database\Factories\AnggotaFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat',
        'nomor_telepon',
        'foto_profil',
        'role',
        'peminjaman_id',
        'ulasan_id',
    ];
}
