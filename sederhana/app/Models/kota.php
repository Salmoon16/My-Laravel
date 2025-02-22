<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    /** @use HasFactory<\Database\Factories\KotaFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'negara_id',
    ];

    public function negara(){
        return $this->belongsTo(negara::class);
    }   

    public function alamats(){
        return $this->hasMany(alamat::class);
    }   
}
