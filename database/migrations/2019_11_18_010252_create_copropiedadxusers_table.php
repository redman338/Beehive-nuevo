<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopropiedadxusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copropiedadxusers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('copropiedad_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();            
            $table->bigInteger('profile_id')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('copropiedad_id')->references('id')->on('copropiedads')
            ->onDelete('cascade')
            ->onUpdate('cascade');


             $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('copropiedadxusers');
    }
}
