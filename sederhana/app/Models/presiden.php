<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presiden extends Model
{
    /** @use HasFactory<\Database\Factories\PresidenFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function negara(){
        return $this->hasOne(negara::class);
    }   
}
