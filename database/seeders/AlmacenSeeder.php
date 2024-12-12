<?php

namespace Database\Seeders;

use App\Models\Almacenes;
use Illuminate\Database\Seeder;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $almacen = new Almacenes();
        $almacen->id=1;
        $almacen->nombre="La ramada";
        $almacen->ubicacion="isabela catolica #15";
        $almacen->save();

        $almacen = new Almacenes();
        $almacen->id=2;
        $almacen->nombre="Los pozos";
        $almacen->ubicacion="comercial los pozos 2do piso #56";
        $almacen->save();

        $almacen = new Almacenes();
        $almacen->id=3;
        $almacen->nombre="Feria pro mayor";
        $almacen->ubicacion="Av 4to anillo Centro comercial Pro mayor Nro 45";
        $almacen->save();


    }
}
