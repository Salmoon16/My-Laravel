<?php

namespace App\Models;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserFamily extends Model
{
    /** @use HasFactory<\Database\Factories\UserFamilyFactory> */
    use HasFactory;

    protected $fillable = [
        'no_kk',
        'father_name',
        'father_job',
        'father_birth',
        'father_phone',
        'mother_name',
        'mother_job',
        'mother_birth',
        'mother_phone',
        'familiable_id',
        'familiable_type'
    ];

    public function familiable(): MorphTo
    {
        return $this->morphTo();
    }

    // public function santri(){
    //     return $this->belongsTo(User::class,'santri_id') ;
    // }

    // public function mentor(){
    //     return $this->belongsTo(Teacher::class,'mentor_id') ;
    // }
}
