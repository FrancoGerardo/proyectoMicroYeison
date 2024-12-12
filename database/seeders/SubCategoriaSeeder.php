<?php

namespace Database\Seeders;

use App\Models\SubCategoria;
use Illuminate\Database\Seeder;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategoria = new SubCategoria();
        $subCategoria->id=1;
        $subCategoria->nombre="Leches";
        $subCategoria->categoria_id=1;
        $subCategoria->save();


        $subCategoria = new SubCategoria();
        $subCategoria->id=2;
        $subCategoria->nombre="Sodas con Gas";
        $subCategoria->categoria_id=3;
        $subCategoria->save();

        $subCategoria = new SubCategoria();
        $subCategoria->id=3;
        $subCategoria->nombre="Sodas sin Gas";
        $subCategoria->categoria_id=3;
        $subCategoria->save();

        $subCategoria = new SubCategoria();
        $subCategoria->id=4;
        $subCategoria->nombre="Arroz";
        $subCategoria->categoria_id=2;
        $subCategoria->save();
    }
}
