<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigfacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configfacturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('copropiedad_id')->unsigned();
            $table->bigInteger('year_id')->unsigned()->nullable();
            $table->bigInteger('month_id')->unsigned()->nullable();
            $table->string('daysinrecargo')->nullable();
            $table->string('dayrecargo')->nullable();
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
        Schema::dropIfExists('configfacturas');
    }
}
