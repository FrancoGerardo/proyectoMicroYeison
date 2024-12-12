<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = ['codigo',  'descripcion', 'id_inventario', 'id_marca', 'id_descuento', 'id_categoria', 'id_subcategoria', 'foto'];


    public function marca(){
        return $this->belongsTo(Marca::class, 'id_marca');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function subCategoria(){
        return $this->belongsTo(SubCategoria::class, 'id_subcategoria');
    }
}

