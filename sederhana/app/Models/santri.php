<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class santri extends Model
{
    /** @use HasFactory<\Database\Factories\SantriFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'pondok_id',
    ];

    public function pondoks(){
        return $this->belongsToMany(pondok::class, 'santri_pondok');
    }   
}
