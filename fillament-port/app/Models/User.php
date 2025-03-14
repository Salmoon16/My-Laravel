<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Assessment;
use App\Models\Attendance;
use App\Models\Permission;
use App\Models\UserFamily;
use App\Models\Departement;
use App\Models\KelasSantri;
use Illuminate\Support\Str;
use App\Models\AttachmentSantri;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Filament\Tables\Columns\Layout\Panel;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        if (Auth::user()->role === $panel->getId()) {
            return true;
        } else {
            return false;
        }
    }

    //biar ga auto-increment
    protected $primaryKey = 'id';
    public $incrementing = false;
    //buat ngasih tau kalo tipenya string
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'no_ktp',
        'nisn',
        'gender',
        'date_of_birth',
        'phone',
        'address',
        'generation',
        'entry_date',
        'graduate_date',
        'status_graduate',
        'kelas_santri_id',
        'department_id',
        'education_stage_id',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public static function generateCustomId($role) {
        $prefix = strtoupper(substr($role ? 'XX' : $role, 0,3));
        $prefix = str_pad($prefix, 3, 'X');
        $uniqueId = Str::upper(Str::random(15));

        return $prefix . $uniqueId;
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model){
            Log::info("$model");
            if (empty($model->id)) {
                do {
                    $id = self::generateCustomId($model->role);
                } while (self::where('id', $id)->exists());
                $model->id = $id;
            }
        });
    }

    public function mentor_of() {
        return $this->hasMany(KelasSantri::class,'mentor_id');
     }

     public function leader_of(){
         return $this->hasMany(Departement::class,'leader_id');
     }
     public function co_leader_of(){
         return $this->hasMany(Departement::class,'co_leader_id');
     }

     public function kelas(){
         return $this->belongsTo(KelasSantri::class,'kelas_santri_id');
     }

     public function department(){
         return $this->belongsTo(Departement::class,'department_id');
     }

     public function program_stage(){
         return $this->belongsTo(EducationStage::class,'education_stage_id');
     }

     public function list_izin(){
         return $this->hasMany(Permission::class,'santri_id');
     }

     public function list_assesment(){
         return $this->hasMany(Assessment::class,'santri_id');
     }

        public function list_attendence(){
        return $this->hasMany(Attendance::class,'santri_id') ;
    }

    public function list_attachment(){
        return $this->hasMany(AttachmentSantri::class,'santri_id') ;
     }

     public function family(): MorphOne
    {
        return $this->morphOne(UserFamily::class, 'familiable');
    }
    //  public function familyy(){
    //      return $this->hasOn(UserFamily::class,'santri_id') ;
    //  }
}

