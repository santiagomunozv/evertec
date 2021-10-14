<?php

namespace Modules\General\Repositories;

use Modules\General\Entities\Producto;

class ProductoRepository
{
  public static function getAllProducts()
  {
    return Producto::get();
  }

  public static function getAllProductsByNameAndId()
  {
    return Producto::All()->pluck('name', 'id');
  }
}
