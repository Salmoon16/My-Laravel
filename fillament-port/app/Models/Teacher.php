<?php

namespace App\Models;

use App\Models\UserFamily;
use App\Models\KelasSantri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    //biar ga auto-increment
    protected $primaryKey = 'id';
    public $incrementing = false;
    //buat ngasih tau kalo tipenya string
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'nip',
        'no_ktp',
        'gender',
        'date_of_birth',
        'phone',
        'address',
        'role',
        'entry_date',
        'graduate_date',
        'kelas_santri_id',
        'profile',
    ];

    public static function generateCustomId($role)
    {
        $prefix = strtoupper(substr($role ? 'XX' : $role, 0, 3));
        $prefix = str_pad($prefix, 3, 'X');
        $uniqueId = Str::upper(Str::random(15));

        return $prefix . $uniqueId;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            Log::info("$model");
            if (empty($model->id)) {
                do {
                    $id = self::generateCustomId($model->role);
                } while (self::where('id', $id)->exists());
                $model->id = $id;
            }
        });
    }

    public function mentor_of()
    {
        return $this->hasMany(KelasSantri::class, 'mentor_id');
    }

    public function kelas()
    {
        return $this->belongsTo(KelasSantri::class, 'kelas_santri_id');
    }

    public function family(): MorphOne
    {
        return $this->morphOne(UserFamily::class, 'familiable');
    }
    // public function family()
    // {
    //     return $this->hasOne(UserFamily::class, 'mentor_id');
    // }
}
