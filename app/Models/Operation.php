<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'sum',
        'description',
        'created_at',
        'updated_at'
    ];

    protected $guarded = ['id'];

//        protected $casts = [
//        'updated_at' => 'date:Y-m-d'
//    ];
}
