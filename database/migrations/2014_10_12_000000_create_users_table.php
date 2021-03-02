<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('role')->unsigned()->nullable();
            $table->string('status')->unsigned()->nullable();
            $table->bigInteger('user_verified')->unsigned()->nullable();
            $table->string('pwd_temp')->nullable();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            
            

            $table->bigInteger('tipo_identificacion')->unsigned()->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('department')->nullable();
            $table->string('nit')->nullable();
            $table->string('file')->nullable();
           
            $table->string('contacto')->nullable();
            $table->string('name_legal')->nullable();    
           
            
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
        Schema::dropIfExists('users');
    }
}
