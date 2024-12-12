<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $table='inventarios'; 
    protected $fillable = ['id_almacen', 'canridad_total'];
   
    public function almacen(){
        return $this->belongsTo(Almacenes::class, 'id_almacen');
    }
}
