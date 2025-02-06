<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekskul extends Model
{
    /** @use HasFactory<\Database\Factories\EkskulFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'presiden_id',
    ];
}
