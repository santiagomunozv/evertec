<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private function phpSelfClear(){
        $server = $_SERVER['PHP_SELF'];
        $sustituir = ['/index.php'];
        foreach($sustituir as $valor){
            $server = str_replace($valor,"",$server);
        }

        return $server;
    }

    protected function consultarPermisos(){
        return $this->consultarPermisosUrl($this->phpSelfClear());
    }

    protected function consultarPermisosUrl($url){

        $datos = DB::table('role as R')
            ->select('O.name as nombreOpcion', 'R.name as nombreRol', 'O.route as rutaOpcion', 'RO.create as adicionarRolOpcion', 'RO.update as modificarRolOpcion', 'RO.delete as eliminarRolOpcion', 'RO.read as consultarRolOpcion' , 'RO.inactive as inactivarRolOpcion')
            ->join('users as U', 'U.role_id', '=', 'R.id')
            ->join('role_option as RO', 'RO.role_id', '=', 'U.role_id')
            ->join('option as O', 'option_id', '=', 'O.id')
            ->join('module as M', 'module_id', '=', 'M.id')
            ->join('package as P', 'package_id', '=', 'P.id')
            ->orderby('P.id')->orderby('P.name')
            ->orderby('M.id')->orderby('M.name')
            ->orderby('O.id')->orderby('O.name')->orderby('O.route')
            ->where('U.id', '=',  Auth::id())
            ->where('O.route', '=', $url)
            ->get()->toArray();

        $permiso = $datos ? get_object_vars($datos[0]) : array('nombreOpcion'=>'', 'nombreRol'=>'', 'rutaOpcion'=>'', 'adicionarRolOpcion'=>1, 'modificarRolOpcion'=>1, 'eliminarRolOpcion'=>1, 'consultarRolOpcion'=>1);
        return ($permiso);
    }

    /**
     * Método generico para construir los datos de una "Multi"
     * 
     * @param Request $request una solicitud del cliente la cual contiene los datos para poblar el array de datos
     * @param String $idPadreKey representa la columna por la cual se relaciona datos hacia otra tabla}
     * @param Int $index representa el indice al cual se está construyendo 
     * @param String[] $fields los campos fillables del objeto que se está construyendo
     * 
     * @return Object[] un array con los datos especificados.
     */
    protected function buildDatos($request ,$idPadreKey , $index , $fields){
        $datos = [];
        foreach($fields as $field){
            if(isset($request[$field] [$index])){
                $datos[$field] = $request[$field] [$index];
            }else{
                $datos[$field] = null;
            }
        }
        $datos[ $idPadreKey ] = $request->get($idPadreKey);
        return $datos;
    }
}
