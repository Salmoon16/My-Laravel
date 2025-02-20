<?php

namespace App\Models;

use App\Models\AttachmentSantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    /** @use HasFactory<\Database\Factories\AttachmentFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'attachment_name',
        'attachment_path'
    ];


    public function list_attachment_santri(){
        return $this->hasMany(AttachmentSantri::class,'attachment_id') ;
    }
}
