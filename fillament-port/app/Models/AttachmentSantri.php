<?php

namespace App\Models;

use App\Models\User;
use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttachmentSantri extends Model
{
    /** @use HasFactory<\Database\Factories\AttachmentSantriFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'santri_id',
        'attachment_id'
    ];

    public function santri(){
        return $this->belongsTo(User::class,'santri_id') ;
    }

    public function attachment(){
        return $this->belongsTo(Attachment::class,'attachment_id') ;
    }
}
