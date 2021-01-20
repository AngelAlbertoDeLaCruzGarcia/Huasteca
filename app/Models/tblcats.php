<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblcats extends Model
{
    use HasFactory;
    public $fillable=[
        'intIdCat',
        'vchCat',
    ];
}
