<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = "articulo";   
    protected $fillable = ['estado','nombre','descripcion','imagen','vencimiento','stok','precio'];
    
}
