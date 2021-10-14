<?php

namespace Modules\Transacciones\Services;

use Carbon\Carbon;
use Modules\Transacciones\Entities\Pedido;
use Modules\Transacciones\Repositories\PedidoRepository;

class PedidoService
{
  /**
   * Método que contiene lógica para guardar un pedido en
   * base de datos asociado a un nuevo consecutivo
   *
   * @param Pedido el pedido a guardar
   * @author Santiago Muñoz
   */
  public static function storeProcess(Pedido $pedido)
  {
    $newCode = PedidoRepository::getNextCode();
    $pedido->code = $newCode;
    $pedido->date = Carbon::Now();
    $pedido->save();
  }
}
