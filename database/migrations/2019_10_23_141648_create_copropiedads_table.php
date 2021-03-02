<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copropiedads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->string('country')->nullable();          
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('file')->nullable();
            $table->string('description')->nullable();
            $table->string('area_comun')->nullable();
            $table->string('area_total')->nullable();
            $table->string('area_privada')->nullable();            
            $table->string('nit')->nullable();
            $table->bigInteger('tipoadministracion_id')->nullable();
            $table->bigInteger('status_id')->nullable();
            $table->bigInteger('tipocopropiedad_id')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('codigo')->nullable();
            $table->bigInteger('num_doc_seq')->nullable();
          

            $table->softDeletes();
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
        Schema::dropIfExists('copropiedads');
    }
}
