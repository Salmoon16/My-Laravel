<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pondok extends Model
{
    /** @use HasFactory<\Database\Factories\PondokFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'santri_id',
    ];

    public function details(){
        return $this->morphOne(alamateble::class, 'alamateble');
    }   
    public function santris(){
        return $this->belongsToMany(santri::class, 'santri_pondok');
    }   
}
