<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    /** @use HasFactory<\Database\Factories\NegaraFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
