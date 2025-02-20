<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'activity_id',
        'status',
        'date',
    ];

    public function activity(){
        return $this->belongsTo(Activities::class,'activity_id');
    }

    public function santri(){
        return $this->belongsTo(User::class,'santri_id') ;
    }
}
