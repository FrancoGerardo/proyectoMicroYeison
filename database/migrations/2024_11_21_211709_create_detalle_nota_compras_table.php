<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleNotaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ['id_notaCompra', 'id_producto', 'cantidad', 'importe', 'importeTotal'];
        Schema::create('detalle_nota_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_notaCompra');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->float('importe');
            $table->float('importeTotal');
            $table->foreign('id_notaCompra')->on('nota_compras')->references('id');
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
        Schema::dropIfExists('detalle_nota_compras');
    }
}
