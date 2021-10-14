<?php

namespace Modules\Transacciones\Factories;

use Modules\Transacciones\Entities\Pedido;
use Modules\Transacciones\Enums\PedidoEnum;

class PedidoFactory
{
  /**
   * Método que contiene la lógica para inicializar los valores de un pedido
   *
   * @return object el pedido
   * @author Santiago Muñoz
   */
  public static function init(): object
  {
    $pedido = new Pedido();
    $pedido->status = PedidoEnum::CREATED;

    return $pedido;
  }
}
