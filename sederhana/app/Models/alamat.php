<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    /** @use HasFactory<\Database\Factories\AlamatFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'kota_id',
    ];

    public function kota(){
        return $this->belongsTo(kota::class);
    }   

}
