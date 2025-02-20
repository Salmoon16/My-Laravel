<?php

namespace App\Models;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activities extends Model
{
    /** @use HasFactory<\Database\Factories\ActivitiesFactory> */
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'activity_date',
        'is_event',
        'description',
    ];

    public function list_attendences(){
        return $this->hasMany(Attendance::class,'activity_id') ;
    }
}
