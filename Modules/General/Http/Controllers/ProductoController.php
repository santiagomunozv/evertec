<?php

namespace Modules\General\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\General\Entities\Producto;
use Modules\General\Http\Requests\ProductoRequest;

class ProductoController extends Controller
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
        $producto = Producto::orderBy('id', 'DESC')->get();
        return view('general::productoGrid', compact('producto', 'permisos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $producto = new Producto();

        return view('general::productoForm', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductoRequest $request)
    {
        try{
            $producto = Producto::create($request->all());
            return response(['id' => $producto->id] , 201);
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
        return view('general::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('general::productoForm', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ProductoRequest $request, $id)
    {
        try{
            $producto = Producto::find($id);
            $producto->fill($request->all());
            $producto->save();
            return response(['id' => $producto->id] , 200);
        }catch(\Exception $e){
            return abort(500, $e->getMessage());
        }
    }
}
