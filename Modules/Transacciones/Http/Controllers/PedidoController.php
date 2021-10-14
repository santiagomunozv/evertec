<?php

namespace Modules\Transacciones\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\General\Entities\Producto;
use Modules\General\Repositories\ProductoRepository;
use Modules\Transacciones\Entities\Pedido;
use Modules\Transacciones\Factories\PedidoFactory;
use Modules\Transacciones\Http\Requests\PedidoRequest;
use Modules\Transacciones\Services\PedidoService;

class PedidoController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $permisos = $this->consultarPermisos();
    if (!$permisos) {
      abort(401);
    }

    $pedido = new Pedido();
    $productos = ProductoRepository::getAllProductsByNameAndId();

    return view('transacciones::pedidoForm', compact('pedido', 'productos'));
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(PedidoRequest $request)
  {
    $pedido = PedidoFactory::init();
    $pedido->fill($request->validated());
    try {
      PedidoService::storeProcess($pedido);
      return response(['id' => $pedido->id], 201);
    } catch (\Exception $e) {
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
    return view('transacciones::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit($id)
  {
    $pedido = pedido::find($id);
    if (!$pedido) {
      return abort(404);
    }
    $productos = ProductoRepository::getAllProductsByNameAndId();

    return view('transacciones::pedidoForm', compact('pedido', 'productos'));
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    $pedido = pedido::find($id);
    $pedido->delete();

    return response([], 200);
  }

  /**
   * Método para consultar el precio de un producto según su id
   * @param id id del producto a consultar
   * @return object
   */
  public function searchPriceByProduct($id): object
  {
    $producto = Producto::find($id);
    return response(['price' => $producto->price], 200);
  }
}
