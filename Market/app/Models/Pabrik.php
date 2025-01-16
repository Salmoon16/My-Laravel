<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pabrik extends Model
{
    /** @use HasFactory<\Database\Factories\PabrikFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
    ];
}
