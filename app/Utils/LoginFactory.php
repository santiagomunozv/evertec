<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class LoginFactory{

    public static function buildOpcion($rows){
        $modulosAssoc = [];
        foreach($rows as $modulo){
            $key = $modulo->idModulo;
            if(!array_key_exists($key , $modulosAssoc)){
                $modulosAssoc[$key] = collect();
            }
            $modulosAssoc[$key]->push($modulo);
        }
        return $modulosAssoc;
    }

    public static function buildModulos($rows){
        $modulosAssoc = [];
        $modulosAdded = [];
        foreach($rows as $modulo){
            $key = $modulo->idPaquete;
            if(!array_key_exists($key , $modulosAssoc)){
                $modulosAssoc[$key] = collect();
            }
            if(!in_array($modulo->idModulo , $modulosAdded)){
                $modulosAssoc[$key]->push($modulo);
                array_push($modulosAdded , $modulo->idModulo);
            }
        }
        return $modulosAssoc;
    }

    public static function buildPaquetes($rows){
        $paquetesAssoc = [];
        foreach($rows as $paquete){
            $key = $paquete->idPaquete;
            if(!array_key_exists($key , $paquetesAssoc)){
                $paquetesAssoc[$key] = $paquete;
            }
        }
        return $paquetesAssoc;
    }

        public static function getMenuData($rol){
            return $rol ? DB::select("SELECT 
                package.id as idPaquete,
                package.name as nombrePaquete,
                module.id as idModulo,
                module.name as nombreModulo,
                option.name as nombreOpcion,
                option.route as rutaOpcion
            FROM role_option
            join option on role_option.option_id = option.id
            join module on option.module_id = module.id
            join package on module.package_id = package.id
            where role_option.role_id = $rol 
            order by package.order, module.name, option.name") : [];
        }

    }