<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesantren extends Model
{
    /** @use HasFactory<\Database\Factories\PesantrenFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'jml_santri',
        'web',
        'email',
        'phone',
        'address',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function kawasans() {
        return $this->hasMany(Kawasan::class);
        }

    public function details() {
        return $this->morphMany(Alamatable::class, 'alamatable');
    }
}
