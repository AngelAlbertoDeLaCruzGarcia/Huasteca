<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team_user extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'team_id',
        'user_id',
        'role',
        'created_at',
        'updated_at',
    ];
}
