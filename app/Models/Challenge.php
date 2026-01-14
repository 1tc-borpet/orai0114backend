<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenges';

    protected $fillable = [
        'title',
        'category',
        'difficulty',
        'reward_points',
        'start_date',
        'end_date',
        'is_active',
        'description',
    ];

    protected $casts = [
        'reward_points' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];
}
