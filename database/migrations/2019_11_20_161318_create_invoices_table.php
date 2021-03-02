<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('numero_doc')->unsigned()->nullable(); 
            $table->bigInteger('copropiedad_id')->unsigned();
            $table->bigInteger('inmueble_id')->unsigned();           
            $table->bigInteger('year_id')->unsigned();
            $table->bigInteger('month_id')->unsigned();
            $table->string('daysinrecargo');
            $table->string('dayrecargo')->nullable();
            $table->decimal('subtotal');       
            $table->decimal('total'); 
            $table->bigInteger('status')->unsigned()->nullable();  


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
        Schema::dropIfExists('invoices');
    }
}
