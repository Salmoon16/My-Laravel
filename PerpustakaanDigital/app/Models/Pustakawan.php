<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pustakawan extends Model
{
    /** @use HasFactory<\Database\Factories\PusakawanFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat',
        'nomor_telpon',
        'foto_profil',
        'role',
        'penulsi_id',
        'anggota_id',
    ];
}
