<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'sum',
        'date',
        'updated_at'
    ];

    protected $guarded = ['id'];

}
