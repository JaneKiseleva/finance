<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'sum',
        'date',
        'updated_at'
    ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
//    protected $casts = [
//        'date' => 'date:Y-m-d',
//    ];
}
