<?php

namespace App\Models;

use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'kelas_santri_id',
        'description'
    ];

    public function kelas(){
        return $this->belongsTo(KelasSantri::class,'kelas_id');
    }

    public function list_assesment(){
        return $this->hasMany(Assessment::class,'lesson_id');
    }

}
