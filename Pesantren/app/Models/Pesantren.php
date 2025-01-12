<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesantren extends Model
{
    /** @use HasFactory<\Database\Factories\PesantrenFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'kota_id',
        'jml_santri',
        'web',
        'email',
        'phone',
        'address',
    ];
}
