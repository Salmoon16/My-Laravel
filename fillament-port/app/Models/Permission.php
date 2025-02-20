<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'reason',
        'status',
        'start_date',
        'end_date'
    ];

    public function santri_izin(){
        return $this->belongsTo(User::class,'santri_id');
    }
}
