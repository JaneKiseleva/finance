<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'balance',
        'created_at',
        'updated_at'
    ];

    protected $guarded = ['id'];

}
