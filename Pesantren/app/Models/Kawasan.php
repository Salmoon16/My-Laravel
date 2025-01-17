<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawasan extends Model
{
    /** @use HasFactory<\Database\Factories\KawasanFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'pesantren_id',
    ];


    public function pesantren() {
        return $this->belongsTo(Pesantren::class);
    }
    public function details() {
        return $this->morphMany(Alamatable::class,'alamatable');
    }
}


// $n = App\Models\Negara::find(5);

