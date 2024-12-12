<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleInventario extends Model
{
    use HasFactory;

    protected $table='detalleInventarios'; 
    protected $fillable = ['fecha_ingreso', 'id_inventario','id_producto', 'cantidad', 'precio','fecha_elaboracion', 'fecha_caducidad'];


    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }

}

