<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    /** @use HasFactory<\Database\Factories\PasarFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'kota_id',
    ];
}
