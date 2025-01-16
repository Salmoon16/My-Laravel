<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatTable extends Model
{
    /** @use HasFactory<\Database\Factories\AlamatTableFactory> */
    use HasFactory;

    protected $fillable = [
        'alamat_id',
        'alamatable_id',
        'alamatable_type',
    ];

    public function alamatable () {
        return $this->morphTo();
    }

    public function alamat() {
        return $this->belongsTo(Alamat::class, 'alamat_id');
    }
}
