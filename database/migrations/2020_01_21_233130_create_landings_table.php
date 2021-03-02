<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('copropiedad_id')->nullable();
            $table->string('name_copropiedad')->nullable();
            $table->string('slug')->nullable();
            $table->string('url_logo')->nullable();
            $table->string('url_banner')->nullable();
            $table->string('url_card_1')->nullable();            
            $table->string('url_card_2')->nullable();            
            $table->string('url_card_3')->nullable();            
            $table->string('url_card_4')->nullable();            
            $table->text('description')->nullable();            
            $table->text('info')->nullable();            
            $table->text('contact')->nullable();
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
        Schema::dropIfExists('landings');
    }
}
