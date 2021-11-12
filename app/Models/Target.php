<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'target_current_cost',
        'planned_date',
        'description',
    ];

    protected $guarded = ['id'];
}








//    public function __construct(array $attributes = [])
//    {
//        parent::__construct($attributes);
//    }
