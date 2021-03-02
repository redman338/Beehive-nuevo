<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->string('color');
            $table->string('textColor');
            $table->string('start');
            $table->string('start_time');
            $table->string('end');
            $table->string('end_time');
            $table->integer('estado_reserva')->unsigned();
            $table->integer('zonacomun_id')->unsigned();
            $table->integer('inmueble_id')->unsigned();    
            $table->integer('user_id')->unsigned();
            $table->integer('copropiedad_id')->unsigned();           
            $table->timestamps();

            $table->foreign('zonacomun_id')->references('id')->on('zonascomunes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('copropiedad_id')->references('id')->on('copropiedads')
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
        Schema::dropIfExists('reservas');
    }
}
