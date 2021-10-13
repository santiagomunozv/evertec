<?php

namespace Modules\Seguridad\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Seguridad\Entities\Usuario;
use Modules\Seguridad\Http\Requests\UsuarioRequest;
use Modules\Seguridad\Repositories\RolRepository;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $permisos = $this->consultarPermisos();
        if(!$permisos){
            abort(401);
        }
        $usuario = Usuario::orderBy('id', 'DESC')->get();
        return view('seguridad::usuarioGrid', compact('usuario', 'permisos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $usuario = new Usuario();
        $usuario->estadoUsuario = "Activo";
        $rol = RolRepository::getAllRolByActive();

        return view('seguridad::usuarioForm', compact('usuario', 'rol'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(UsuarioRequest $request)
    {
        try{
            $usuario = Usuario::create($request->all());
            return response(['id' => $usuario->id] , 201);
        }catch(\Exception $e){
            return abort(500, $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('seguridad::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $rol = RolRepository::getAllRolByActive();

        return view('seguridad::usuarioForm', compact('usuario', 'rol'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UsuarioRequest $request, $id)
    {
        try{
            $usuario = Usuario::find($id);
            $usuario->fill($request->all());
            $usuario->save();
            return response(['id' => $usuario->id] , 200);
        }catch(\Exception $e){
            return abort(500, $e->getMessage());
        }
    }
}
