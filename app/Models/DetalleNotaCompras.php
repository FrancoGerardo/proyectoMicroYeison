<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleNotaCompras extends Model
{
    use HasFactory;
    protected $table = 'detalleNotaCompras';
    protected $fillable = ['id_notaCompra', 'id_producto', 'cantidad', 'importe', 'importeTotal'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
