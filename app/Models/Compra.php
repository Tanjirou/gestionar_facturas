<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable =['id_producto','id_usuario','cantidad','monto_producto','monto_impuesto','estatus'];
}
