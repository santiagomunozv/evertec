<?php

namespace Modules\Seguridad\Entities;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model 
{
    protected $table = 'package';
    protected $primaryKey = 'id';
    protected $fillable = ['order', 'name'];
}
