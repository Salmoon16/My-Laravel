<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamateble extends Model
{
    /** @use HasFactory<\Database\Factories\AlamatebleFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat_id',
        'alamateble_id',
        'alamateble_type',
    ];

    public function alamat(){
        return $this->belongsTo(alamat::class);
    }   

    public function alamateble(){
        return $this->morphTo();
    }   
}
