<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptosxfacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptosxfacturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('configfactura_id')->unsigned();
            $table->bigInteger('concepto_id')->unsigned();
            $table->double('valor');
            $table->bigInteger('copropiedad_id')->unsigned();
            $table->timestamps();


             $table->foreign('configfactura_id')->references('id')->on('configfacturas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('concepto_id')->references('id')->on('conceptosfinancieros')
                ->onDelete('cascade')
                ->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conceptosxfacturas');
    }
}
