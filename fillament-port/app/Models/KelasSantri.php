<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelasSantri extends Model
{
    /** @use HasFactory<\Database\Factories\KelasSantriFactory> */
    use HasFactory;

    protected $fillable = [
        'major',
        'mentor_id'
    ];

    public function list_santri(){
        return  $this->hasMany(User::class,'kelas_santri_id');
      }

      public function mentor(){
          return $this->belongsTo(Teacher::class,'mentor_id');
      }

      public function list_lesson(){
          return $this->hasMany(Lesson::class,'kelas_id');
      }
}
