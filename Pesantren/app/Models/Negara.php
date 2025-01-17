<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Negara extends Model
{
    /** @use HasFactory<\Database\Factories\NegaraFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function kotas() {
        return $this->hasMany(Kota::class);
    }
}


