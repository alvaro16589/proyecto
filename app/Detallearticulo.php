<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detallearticulo extends Model
{
    protected $table = "detallearticulo";   
    protected $fillname = ['cantidad','precio','idart','iddetall'];
    
}
