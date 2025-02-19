<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentSantri extends Model
{
    /** @use HasFactory<\Database\Factories\AttachmentSantriFactory> */
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'attachment_id'
    ];
}
