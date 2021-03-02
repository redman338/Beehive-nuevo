<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIteminvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iteminvoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('concepto_id')->unsigned(); 
            $table->decimal('valor', 65,2); 
            $table->decimal('iva', 65,2)->nullable(); 
            $table->bigInteger('quantity')->unsigned()->nullable(); 
            $table->bigInteger('invoice_id')->unsigned(); 
            $table->bigInteger('numero_doc')->unsigned(); 
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
        Schema::dropIfExists('iteminvoices');
    }
}
