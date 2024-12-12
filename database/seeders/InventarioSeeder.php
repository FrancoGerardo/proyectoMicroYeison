<?php

namespace Database\Seeders;

use App\Models\Inventario;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventario = new Inventario();
        $inventario->id=1;
        $inventario->id_almacen =1;
        $inventario->cantidad_total = 0;
        $inventario->save();

        $inventario = new Inventario();
        $inventario->id=2;
        $inventario->id_almacen =2;
        $inventario->cantidad_total = 0;
        $inventario->save();

        $inventario = new Inventario();
        $inventario->id=3;
        $inventario->id_almacen =3;
        $inventario->cantidad_total = 0;
        $inventario->save();
    }
}
