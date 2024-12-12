<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;
    protected $table = 'nota_compras';
    protected $fillable = ['id_proveedor', 'id_sucursal', 'fecha', 'importeTotal'];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function sucursal(){
        return $this->belongsTo(Almacenes::class, 'id_sucursal');
    }
}
