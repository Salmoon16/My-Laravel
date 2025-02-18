<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSantri extends Model
{
    /** @use HasFactory<\Database\Factories\KelasSantriFactory> */
    use HasFactory;

    protected $fillable = [
        'major',
        'mentor_id'
    ];
}
