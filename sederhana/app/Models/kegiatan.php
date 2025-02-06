<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    /** @use HasFactory<\Database\Factories\KegiatanFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function uwee(){
        return $this->morphToMany(santri::class, 'santriable');
    }   
}
