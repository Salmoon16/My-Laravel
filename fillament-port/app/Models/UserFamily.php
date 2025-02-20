<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserFamily extends Model
{
    /** @use HasFactory<\Database\Factories\UserFamilyFactory> */
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'no_kk',
        'father_name',
        'father_job',
        'father_birth',
        'father_phone',
        'mother_name',
        'mother_job',
        'mother_birth',
        'mother_phone'
    ];

    public function santri(){
        return $this->belongsTo(User::class,'santri_id') ;
    }
}
