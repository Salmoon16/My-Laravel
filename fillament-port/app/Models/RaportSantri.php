<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportSantri extends Model
{
    /** @use HasFactory<\Database\Factories\RaportSantriFactory> */
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'academic_year',
        'overall_score',
        'strengths',
        'weaknesses'
    ];
}
