<?php

namespace Modules\Transacciones\Repositories;

use Modules\Transacciones\Entities\Pedido;

class PedidoRepository
{
  /**
   * Método que contiene la búsqueda de un nuevo código
   * en forma de consecutivo para los pedidos
   *
   * @return int el nuevo código para el pedido
   * @author Santiago Muñoz
   */
  public static function getNextCode(): int
  {
    $pedido = Pedido::All()->last();
    $code = $pedido ? $pedido['code'] : 0;
    $newCode = $code + 1;

    $checkCode = Pedido::count();

    if ($checkCode) {
      $maxcode = Pedido::max('code');
      $newCode = $maxcode + 1;
    }
    return $newCode;
  }
}
