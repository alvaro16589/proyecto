<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";   
    protected $fillable  = ['nombre','apellido','ci'];
    // protected $primarykey = "cliente_id";
 }