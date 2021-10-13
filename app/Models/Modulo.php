<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model 
{
    protected $table = 'module';
    protected $primaryKey = 'id';
    protected $fillable = ['package_id', 'name'];
}
