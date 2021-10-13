<?php
namespace App\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\utils\LoginFactory;
use Illuminate\Support\Facades\DB;

/**
 * Esta clase contiene la logica necesaria para establecer los objetos de la sesión 
 * de acuerdo al usuario que hace login en la aplicacion.
 * Los únicos metodos que deberían ser llamados son setSessionModels
 * 
 */
class AuthService{
    public static $USER_ROLE = "role_id";
    public static $LOGIN_NAME = "login";
    
    private static $BASE_SQL = "SELECT 
        users.id as usuario_id,
        role_id,
        users.login
    FROM users
    WHERE active = 1 AND users.id =";

    /**
     * 
     * Metodo que establece los valores de la sesion para el usuario que hace login
     * 
     * @return true si se encuentran datos
     */
    public static function setSessionModels(){
        $data = self::getSessionDataByUsuario(Auth::id());
        return self::validateAndSetSessionModels($data);
    }

    private static function validateAndSetSessionModels($data){
        if(!$data || count($data) < 1){
            return false;
        }
        self::setModels($data[0]);
        return true;
    }

    /**
     * Metodo encargado de determinar cuales variables de sesion se establecen
     */
    private static function setModels($data){
        self::setUserModels($data);
        self::setMenuModels($data);
    }

    /**
     * Metodo encargado de establecer los modelos relacionados al usuario que está logueado
     */
    private static function setUserModels($data){
        Session::put(self::$USER_ROLE , $data->role_id);
        Session::put(self::$LOGIN_NAME , $data->login);
    }

    /**
     * Metodo encargado de establecer los modelos usados para construir el menu de la aplicacion
     * 
     */
    private static function setMenuModels($data){
        $idRol = $data->role_id;
        $menuGeneral = LoginFactory::getMenuData($idRol);
        Session::put('packageDinamicMenuAsgardPaquetes',LoginFactory::buildPaquetes($menuGeneral));
        Session::put('packageDinamicMenuAsgardModulos',LoginFactory::buildModulos($menuGeneral));
        Session::put('packageDinamicMenuAsgardOpciones',LoginFactory::buildOpcion($menuGeneral));
    }

    private static function getSessionDataByUsuario($idUsuario){
        return DB::select(self::$BASE_SQL ."{$idUsuario} LIMIT 1");
    }
}