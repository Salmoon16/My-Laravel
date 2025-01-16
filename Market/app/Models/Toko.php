<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    /** @use HasFactory<\Database\Factories\TokoFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "pabrik_id"
    ];

    public function users () {
        return $this->hasMany(User::class);
    }
}
