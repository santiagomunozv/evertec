<?php

namespace Modules\Transacciones\Entities;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['date', 'code', 'product_id', 'price', 'document_type', 'document_number', 'customer_name', 'customer_last_name', 'customer_email', 'customer_mobile'];
}
