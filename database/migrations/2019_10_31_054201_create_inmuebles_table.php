<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('copropiedad_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('name');          
            $table->string('description')->nullable();
            $table->bigInteger('tipoinmueble_id')->unsigned()->nullable();
            $table->bigInteger('bloque_id')->unsigned()->nullable();
            $table->bigInteger('status_id')->nullable();
            
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('copropiedad_id')->references('id')->on('copropiedads')
                ->onDelete('cascade')
                ->onUpdate('cascade');

             $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('bloque_id')->references('id')->on('bloques')
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
        Schema::dropIfExists('inmuebles');
    }
}
