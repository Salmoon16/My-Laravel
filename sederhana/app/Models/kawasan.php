<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kawasan extends Model
{
    /** @use HasFactory<\Database\Factories\KawasanFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
