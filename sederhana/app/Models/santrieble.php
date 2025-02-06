<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class santrieble extends Model
{
    /** @use HasFactory<\Database\Factories\SantriebleFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'santri_id',
        'santrieble_id',
        'santrieble_type',
    ];

    public function uwaws(){
        return $this->morphedByMany(kegiatan::class,'santrieble');
    }   
}
