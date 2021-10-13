<?php

namespace Modules\Seguridad\Entities;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model 
{
    protected $table = 'role_option';
    protected $primaryKey = 'id';
    protected $fillable = ['create', 'update', 'delete', 'read', 'inactive', 'role_id', 'option_id'];
}
