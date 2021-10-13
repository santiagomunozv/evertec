<?php

namespace Models\App;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model 
{
    protected $table = 'option';
    protected $primaryKey = 'id';
    protected $fillable = ['module_id', 'name', 'route'];
}
