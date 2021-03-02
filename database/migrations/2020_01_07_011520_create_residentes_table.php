<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residentes', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('inmueble_id');
            $table->bigInteger('copropiedad_id');
            $table->bigInteger('propietario_id');
            $table->string('residente_1')->nullable();
            $table->bigInteger('residente_1_cc')->nullable();
            $table->bigInteger('residente_1_phone_1')->nullable();
            $table->bigInteger('residente_1_celular_1')->nullable();
            $table->string('email')->nullable();
            $table->string('residente_2')->nullable();
            $table->bigInteger('residente_2_cc')->nullable();
            $table->bigInteger('residente_2_phone_1')->nullable();
            $table->bigInteger('residente_2_celular_1')->nullable();
            $table->string('c_emergency')->nullable();
            $table->string('inmobiliaria')->nullable();
            $table->bigInteger('inmobiliaria_phone')->nullable();
            $table->bigInteger('inmobiliaria_celular')->nullable();
            $table->string('inmobiliaria_contact')->nullable();
            $table->string('mascota_tipo')->nullable();
            $table->string('mascota_nombre')->nullable();
            $table->string('mascota_raza')->nullable();
            $table->string('mascota_color')->nullable();
            $table->string('vehiculo_tipo')->nullable();
            $table->string('vehiculo_marca')->nullable();
            $table->string('vehiculo_modelo')->nullable();
            $table->string('vehiculo_placa')->nullable();
            $table->string('vehiculo_color')->nullable();
            $table->string('vehiculo_parqueadero')->nullable();
            $table->string('colaborador_nombre')->nullable();
            $table->string('colaborador_phone_1')->nullable();
            $table->string('colaborador_celular')->nullable();
            $table->string('colaborador_direccionresidencia')->nullable();
            $table->string('colaborador_c_emergency')->nullable();
            $table->string('colaborador_c_phone_2')->nullable();
            $table->string('colaborador_c_celular')->nullable();
            $table->string('registro_status')->nullable();
            $table->string('politica_datos')->nullable();
            $table->string('date_autorization')->nullable();
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
        Schema::dropIfExists('residentes');
    }
}
