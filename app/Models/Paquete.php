<?php

namespace Models\App;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model 
{
    protected $table = 'package';
    protected $primaryKey = 'id';
    protected $fillable = ['order', 'name'];
}
