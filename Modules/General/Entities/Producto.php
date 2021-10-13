<?php

namespace Modules\General\Entities;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model 
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'name', 'price'];
}
