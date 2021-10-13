<?php

namespace Modules\Seguridad\Repositories;

use Modules\Seguridad\Entities\Rol;

class RolRepository{
    public static function getAllRol(){
        return Rol::get();
    }

    public static function getAllRolByActive(){
        return Rol::where('active', 1)->pluck('name', 'id');
    }

    public static function getRolById(){
        return Rol::All()->pluck('idRol');
    }

    public static function getRolByNombre(){
        return Rol::All()->pluck('nombreRol');
    }
}
