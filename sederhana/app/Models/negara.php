<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class negara extends Model
{
    /** @use HasFactory<\Database\Factories\NegaraFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'presiden_id',
    ];

    public function presiden(){
        return $this->belongsTo(presiden::class);
    }   

    public function kotas(){
        return $this->hasMany(kota::class);
    }   
}
