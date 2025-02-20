<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    /** @use HasFactory<\Database\Factories\DepartementFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'leader_id',
        'co_leader_id'
    ];

    public function members(){
        return $this->hasMany(User::class,'department_id');
    }

    public function leader(){
        return $this->belongsTo(User::class,'leader_id');
    }

    public function co_leader(){
        return $this->belongsTo(User::class,'co_leader_id');
    }
}
