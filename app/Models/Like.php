<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory, SoftDeletes;    // Adding the SoftDeletes trait tells laravel that a like has been deleted, though not physically removed

    protected $fillable = [
        'user_id'
    ];
}
