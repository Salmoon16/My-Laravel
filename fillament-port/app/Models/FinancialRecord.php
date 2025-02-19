<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    /** @use HasFactory<\Database\Factories\FinancialRecordFactory> */
    use HasFactory;

    protected $fillable = [
        'accounting_id',
        'category',
        'description',
        'transaction_type',
        'amount',
        'transaction_date'
    ];
}
