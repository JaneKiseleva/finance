<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'sum',
        'date',
        'updated_at'
    ];

    protected $guarded = ['id'];

//    protected $casts = [
//        'date' => 'date:Y-m-d',
//    ];
}
