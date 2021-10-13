<?php

namespace Models\App;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model 
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'active'];
}
