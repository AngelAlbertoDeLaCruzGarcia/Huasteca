<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tblcats;
use Illuminate\Support\Facades\Storage;

class tblproductos extends Model
{
    use HasFactory;
    protected $fillable=[
    'vchImg',
    'vchProd',
    'vchDesc',
    'vchTalla',
    'intCant',
    'fltPrecio',
    'intIdCat',
    'intIDProd'
    ];

    public function categoria(){
        return $this->belongsTo(tblcats::class,'intIdCat','intIdCat');
    }
    public function scopeBusqueda($query,$dato){
        return $query->where('vchProd','LIKE',"%$dato%");
    }

}
