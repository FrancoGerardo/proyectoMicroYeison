<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inventarios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso'); 
            $table->unsignedBigInteger('id_inventario');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->float('precio');
            $table->date('fecha_elaboracion');
            $table->date('fecha_caducidad');
            $table->foreign('id_inventario')->on('inventarios')->references('id');
            $table->foreign('id_producto')->on('productos')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_inventarios');
    }
}
